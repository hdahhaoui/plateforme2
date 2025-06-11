<?php
require_once __DIR__.'/db.php';

$pid = intval($_GET['pid'] ?? 0);
if ($pid) {
    $stmt = $mysqli->prepare('DELETE FROM post_prj WHERE pid=?');
    if ($stmt) {
        $stmt->bind_param('i', $pid);
        $stmt->execute();
    }
}
header('Location: ../client.php');
exit;
?>
