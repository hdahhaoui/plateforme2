<?php
require_once __DIR__.'/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $to = 'admin@example.com';
    $subject = 'Contact Form Message';
    $body = "Name: $name\nEmail: $email\nPhone: $phone\n\n$message";
    @mail($to, $subject, $body);
}
header('Location: ../post.php');
exit;
?>
