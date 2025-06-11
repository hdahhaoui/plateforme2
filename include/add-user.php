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
    }
    $_SESSION['msg'] = ['type' => 'success', 'msg' => 'Account created'];
    header('Location: ../login.php');
    exit;
}
header('Location: ../signup.php');
?>
