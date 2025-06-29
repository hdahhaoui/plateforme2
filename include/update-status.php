<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid    = intval($_POST['pid'] ?? 0);
    $status = trim($_POST['status'] ?? '');

    $allowedStatuses = ['open', 'in progress', 'completed'];

    if ($pid && in_array($status, $allowedStatuses, true)) {
        $uid = $_SESSION['USER_ID'] ?? 0;
        $stmt = $mysqli->prepare('UPDATE projects SET status=? WHERE id=? AND user_id=?');
        if ($stmt) {
            $stmt->bind_param('sii', $status, $pid, $uid);
            $stmt->execute();
        }
    }
}

header('Location: ../post.php');
exit;
?>
