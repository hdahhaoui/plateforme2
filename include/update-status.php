<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = intval($_POST['pid'] ?? 0);
    $status = trim($_POST['status'] ?? '');
    if ($pid && $status) {
        $stmt = $mysqli->prepare('UPDATE projects SET status=? WHERE id=? AND user_id=?');
        if ($stmt) {
            $uid = $_SESSION['USER_ID'] ?? 0;
            $stmt->bind_param('sii', $status, $pid, $uid);
            $stmt->execute();
        }
    }
}

header('Location: ../post.php');
exit;
?>
