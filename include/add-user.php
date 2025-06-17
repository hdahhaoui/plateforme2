<?php
require_once __DIR__.'/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT);
    $type = $_POST['usertype'] ?? 'client';

    // Determine if the `users` table uses the column `name` or `username` for the
    // user's display name. Some deployments still contain a legacy `username`
    // field which triggers a SQL error when `name` is used.
    $nameColumn = 'name';
    $colCheck = $mysqli->query("SHOW COLUMNS FROM users LIKE 'name'");
    if (!$colCheck || $colCheck->num_rows === 0) {
        $nameColumn = 'username';
    }

    $stmt = $mysqli->prepare("INSERT INTO users (`$nameColumn`, email, password, type) VALUES (?,?,?,?)");
    if ($stmt) {
        $stmt->bind_param('ssss', $name, $email, $password, $type);
        $stmt->execute();
        $uid = $mysqli->insert_id;
        if ($type === 'client') {
            $sec     = trim($_POST['sec'] ?? '');
            $serv    = trim($_POST['serv'] ?? '');
            $address = trim($_POST['address'] ?? '');
            $phone   = trim($_POST['phone'] ?? '');

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
        }
    }
    $_SESSION['msg'] = ['type' => 'success', 'msg' => 'Account created'];
    header('Location: ../login.php');
    exit;
}
header('Location: ../signup.php');
?>
