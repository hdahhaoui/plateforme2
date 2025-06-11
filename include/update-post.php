<?php
require_once __DIR__.'/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = intval($_POST['pid'] ?? 0);
    $title = trim($_POST['title'] ?? '');
    $detail = trim($_POST['detail'] ?? '');
    $cost = floatval($_POST['cost'] ?? 0);

    $stmt = $mysqli->prepare('UPDATE post_prj SET name=?, detail=?, cost=? WHERE pid=?');
    if ($stmt) {
        $stmt->bind_param('ssdi', $title, $detail, $cost, $pid);
        $stmt->execute();
    }
    header('Location: ../client.php');
    exit;
}
header('Location: ../client.php');
?>
