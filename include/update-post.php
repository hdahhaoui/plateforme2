<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid    = intval($_POST['pid'] ?? 0);
    $title  = trim($_POST['name'] ?? '');
    $desc   = trim($_POST['about'] ?? '');
    $budget = floatval($_POST['cost'] ?? 0);

    $stmt = $mysqli->prepare('UPDATE projects SET title=?, description=?, budget=? WHERE id=?');
    if ($stmt) {
        $stmt->bind_param('ssdi', $title, $desc, $budget, $pid);
        $stmt->execute();
    }

    header('Location: ../post.php?pid=' . $pid);
    exit;
}

header('Location: ../client.php');
?>
