<?php
require_once __DIR__.'/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $password = password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT);
    $type    = $_POST['usertype'] ?? 'client';
    $address = trim($_POST['address'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');

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
            $fstmt = $mysqli->prepare('INSERT INTO freelancer (fid, name, lang) VALUES (?,?,?)');
            if ($fstmt) {
                $fstmt->bind_param('iss', $uid, $name, $domain);
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
    $_SESSION['msg'] = ['type' => 'success', 'msg' => 'Account created'];
    header('Location: ../login.php');
    exit;
}
header('Location: ../signup.php');
?>
