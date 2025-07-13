<?php
require_once __DIR__.'/db.php';
require_once __DIR__.'/send_verification.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $password = password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT);
    $type    = $_POST['usertype'] ?? 'client';
    $address = trim($_POST['address'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');

    // verify reCAPTCHA
    $captcha = $_POST['g-recaptcha-response'] ?? '';
    $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.
        urlencode($recaptchaSecretKey).'&response='.urlencode($captcha));
    $verifyData = json_decode($verify, true);
    if (!$verifyData['success']) {
        $_SESSION['msg'] = ['type' => 'danger', 'msg' => 'reCAPTCHA invalide'];
        header('Location: ../signup.php');
        exit;
    }

    $imgName = null;
    if (!empty($_FILES['image']['name'])) {
        $targetDir = dirname(__DIR__) . '/php/images/';
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $base = basename($_FILES['image']['name']);
        $imgName = time() . $base;
        $path = $targetDir . $imgName;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
            $imgName = null;
        }
    }

    $attestationName = null;
    if (!empty($_FILES['attestation']['name'])) {
        $targetDir = dirname(__DIR__) . '/php/images/';
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $base = basename($_FILES['attestation']['name']);
        $attestationName = time() . 'att_' . $base;
        $path = $targetDir . $attestationName;
        if (!move_uploaded_file($_FILES['attestation']['tmp_name'], $path)) {
            $attestationName = null;
        }
    }

    // Determine if the `users` table uses the column `name` or `username` for the
    // user's display name. Some deployments still contain a legacy `username`
    // field which triggers a SQL error when `name` is used.
    $nameColumn = 'name';
    $colCheck = $mysqli->query("SHOW COLUMNS FROM users LIKE 'name'");
    if (!$colCheck || $colCheck->num_rows === 0) {
        $nameColumn = 'username';
    }

    $columns = "`$nameColumn`, email, password, type";
    $placeholders = "?,?,?,?";
    $typesBind = "ssss";
    $params = [$name, $email, $password, $type];

    $token = bin2hex(random_bytes(32));
    $tokenDate = date('Y-m-d H:i:s');

    $tokCheck = $mysqli->query("SHOW COLUMNS FROM users LIKE 'verify_token'");
    if ($tokCheck && $tokCheck->num_rows > 0) {
        $columns .= ", verify_token, token_created, is_verified";
        $placeholders .= ",?,?,?";
        $typesBind .= "ssi";
        $params[] = $token;
        $params[] = $tokenDate;
        $params[] = 0;
    }

    $checkPhone = $mysqli->query("SHOW COLUMNS FROM users LIKE 'phone'");
    if ($checkPhone && $checkPhone->num_rows > 0) {
        $columns .= ", phone";
        $placeholders .= ",?";
        $typesBind .= "s";
        $params[] = $phone;
    }
    $checkAddr = $mysqli->query("SHOW COLUMNS FROM users LIKE 'address'");
    if ($checkAddr && $checkAddr->num_rows > 0) {
        $columns .= ", address";
        $placeholders .= ",?";
        $typesBind .= "s";
        $params[] = $address;
    }
    $checkImg = $mysqli->query("SHOW COLUMNS FROM users LIKE 'profile_img'");
    if ($checkImg && $checkImg->num_rows > 0) {
        $columns .= ", profile_img";
        $placeholders .= ",?";
        $typesBind .= "s";
        $params[] = $imgName;
    }

    $stmt = $mysqli->prepare("INSERT INTO users ($columns) VALUES ($placeholders)");
    if ($stmt) {
        $stmt->bind_param($typesBind, ...$params);
        $stmt->execute();
        $uid = $mysqli->insert_id;

        if ($type === 'client') {
            $sec  = trim($_POST['sec'] ?? '');
            $serv = trim($_POST['serv'] ?? '');

            // Check if the `client` table contains an `address` column.
            $addrCol = $mysqli->query("SHOW COLUMNS FROM client LIKE 'address'");

            if ($addrCol && $addrCol->num_rows > 0) {
                $cstmt = $mysqli->prepare('INSERT INTO client (cid, sec, serv, address, phone) VALUES (?,?,?,?,?)');
                if ($cstmt) {
                    $cstmt->bind_param('issss', $uid, $sec, $serv, $address, $phone);
                    $cstmt->execute();
                }
            } else {
                $cstmt = $mysqli->prepare('INSERT INTO client (cid, sec, serv, phone) VALUES (?,?,?,?)');
                if ($cstmt) {
                    $cstmt->bind_param('isss', $uid, $sec, $serv, $phone);
                    $cstmt->execute();
                }
            }
        } else {
            $domain = trim($_POST['domaine'] ?? '');

            $columnsFl = 'fid, name, lang';
            $placeFl  = '?,?,?';
            $typesFl   = 'iss';
            $paramsFl  = [$uid, $name, $domain];

            $attCheck = $mysqli->query("SHOW COLUMNS FROM freelancer LIKE 'attestation'");
            if ($attCheck && $attCheck->num_rows > 0) {
                $columnsFl .= ', attestation';
                $placeFl   .= ',?';
                $typesFl   .= 's';
                $paramsFl[] = $attestationName;
            }

            $fstmt = $mysqli->prepare("INSERT INTO freelancer ($columnsFl) VALUES ($placeFl)");
            if ($fstmt) {
                $fstmt->bind_param($typesFl, ...$paramsFl);
                $fstmt->execute();
            }
        }

        // create messaging user profile after related table entry exists
        if ($type === 'client') {
            $msgStmt = $mysqli->prepare('INSERT INTO mssgusers (cid, name, img) VALUES (?,?,?)');
        } else {
            $msgStmt = $mysqli->prepare('INSERT INTO mssgusers (fid, name, img) VALUES (?,?,?)');
        }
        if ($msgStmt) {
            $msgStmt->bind_param('iss', $uid, $name, $imgName);
            $msgStmt->execute();
        }
    }
    if (!empty($token)) {
        sendVerificationMail($email, $token, $smtpFrom, $smtpName);
    }
    $_SESSION['msg'] = ['type' => 'success', 'msg' => 'Compte créé, veuillez confirmer votre e-mail'];
    header('Location: ../login.php');
    exit;
}
header('Location: ../signup.php');
?>
