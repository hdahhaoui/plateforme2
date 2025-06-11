<?php
require_once __DIR__.'/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = intval($_POST['pid'] ?? 0);
    $rid = intval($_POST['rid'] ?? 0);
    $stmt = $mysqli->prepare('UPDATE post_req SET status="Hired" WHERE rid=? AND pid=?');
    if ($stmt) {
        $stmt->bind_param('ii', $rid, $pid);
        $stmt->execute();
    }
    header('Location: ../projects.php?pid=' . $pid);
    exit;
}
header('Location: ../projects.php');
?>
