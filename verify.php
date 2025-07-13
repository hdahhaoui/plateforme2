<?php
require 'include/config.php';
require 'include/db.php';
require 'include/send_verification.php';

$token = $_GET['token'] ?? '';
if (!$token) {
    echo 'Lien invalide';
    exit;
}

$stmt = $mysqli->prepare('SELECT id, email, token_created, is_verified FROM users WHERE verify_token = ? LIMIT 1');
if ($stmt) {
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        $created = strtotime($row['token_created']);
        if ($row['is_verified']) {
            echo 'Compte déjà vérifié';
            exit;
        }
        if ($created && (time() - $created) <= 86400) {
            $up = $mysqli->prepare('UPDATE users SET is_verified = 1, verify_token = NULL, token_created = NULL WHERE id = ?');
            if ($up) {
                $up->bind_param('i', $row['id']);
                $up->execute();
                echo 'Votre compte est désormais vérifié.';
                exit;
            }
        } else {
            echo 'Token expiré, veuillez demander un nouvel email.';
            exit;
        }
    }
}

echo 'Lien invalide';
