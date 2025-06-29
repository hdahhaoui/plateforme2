<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid    = intval($_POST['pid'] ?? 0);
    $status = strtolower(trim($_POST['status'] ?? ''));

    $allowedStatuses = ['open', 'in progress', 'closed', 'completed'];

    if ($pid && in_array($status, $allowedStatuses, true)) {
        $stmt = $mysqli->prepare('UPDATE projects SET status=? WHERE id=?');
        if ($stmt) {
            $stmt->bind_param('si', $status, $pid);
            $stmt->execute();
        }
    }
}

$redirect = '../post.php';
if (!empty($pid)) {
    $redirect .= '?pid=' . $pid;
}

header('Location: ' . $redirect);
exit;
?>
