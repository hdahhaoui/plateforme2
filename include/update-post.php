<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid      = intval($_POST['pid'] ?? 0);
    $name     = trim($_POST['name'] ?? '');
    $category = trim($_POST['prjtype'] ?? '');
    $detail   = trim($_POST['about'] ?? '');
    $lang     = trim($_POST['lang'] ?? '');
    $cost     = floatval($_POST['cost'] ?? 0);

    $stmt = $mysqli->prepare('UPDATE post_prj SET name=?, category=?, detail=?, lang=?, cost=? WHERE pid=?');
    if ($stmt) {
        $stmt->bind_param('ssssdi', $name, $category, $detail, $lang, $cost, $pid);
        $stmt->execute();
    }

    header('Location: ../client.php');
    exit;
}

header('Location: ../client.php');
?>
