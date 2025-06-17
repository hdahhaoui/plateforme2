<?php
require_once __DIR__.'/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT);
    $type = $_POST['usertype'] ?? 'client';

    $stmt = $mysqli->prepare('INSERT INTO users (name,email,password,type) VALUES (?,?,?,?)');
    if ($stmt) {
        $stmt->bind_param('ssss', $name, $email, $password, $type);
        $stmt->execute();
        $uid = $mysqli->insert_id;
        if ($type === 'client') {
            $sec     = trim($_POST['sec'] ?? '');
            $serv    = trim($_POST['serv'] ?? '');
            $address = trim($_POST['address'] ?? '');
            $phone   = trim($_POST['phone'] ?? '');
            $cstmt = $mysqli->prepare('INSERT INTO client (cid, sec, serv, address, phone) VALUES (?,?,?,?,?)');
            if ($cstmt) {
                $cstmt->bind_param('issss', $uid, $sec, $serv, $address, $phone);
                $cstmt->execute();
            }
        }
    }
    $_SESSION['msg'] = ['type' => 'success', 'msg' => 'Account created'];
    header('Location: ../login.php');
    exit;
}
header('Location: ../signup.php');
?>
