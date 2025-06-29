<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid    = intval($_POST['pid'] ?? 0);
    $title  = trim($_POST['name'] ?? '');
    $desc   = trim($_POST['about'] ?? '');
    $budget = floatval($_POST['cost'] ?? 0);
    if (!empty($_POST['deadline'])) {
        $ts = strtotime($_POST['deadline']);
        $deadline = $ts ? date('Y-m-d', $ts) : null;
    } else {
        $deadline = null;
    }


    $stmt = $mysqli->prepare('UPDATE projects SET title=?, description=?, budget=?, deadline=? WHERE id=?');

    if ($stmt) {
        $stmt->bind_param('ssdsi', $title, $desc, $budget, $deadline, $pid);
        $stmt->execute();
    }


    header('Location: ../post.php?pid=' . $pid);
    exit;
}  

header('Location: ../client.php');
?>
