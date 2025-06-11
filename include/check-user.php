<?php
require_once __DIR__.'/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $type = $_POST['usertype'] ?? '';

    $stmt = $mysqli->prepare('SELECT id,password,type FROM users WHERE email = ? LIMIT 1');
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['USER_ID'] = $row['id'];
                $_SESSION['USER_TYPE'] = $row['type'];
                if ($row['type'] === 'freelancer') {
                    header('Location: ../projects/projects.php');
                } else {
                    header('Location: ../client.php');
                }
                exit;
            }
        }
    }
    $_SESSION['msg'] = ['type' => 'danger', 'msg' => 'Invalid credentials'];
    header('Location: ../login.php');
    exit;
}
header('Location: ../login.php');
?>
