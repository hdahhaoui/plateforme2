<?php
require_once __DIR__.'/db.php';

$pid = intval($_POST['pid'] ?? 0);
$uid = $_SESSION['USER_ID'] ?? 0;

if ($pid && $uid) {
    $stmt = $mysqli->prepare('SELECT id FROM favorites WHERE user_id=? AND project_id=?');
    if ($stmt) {
        $stmt->bind_param('ii', $uid, $pid);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res && $res->num_rows) {
            $del = $mysqli->prepare('DELETE FROM favorites WHERE user_id=? AND project_id=?');
            if ($del) {
                $del->bind_param('ii', $uid, $pid);
                $del->execute();
            }
        } else {
            $ins = $mysqli->prepare('INSERT INTO favorites (user_id, project_id) VALUES (?,?)');
            if ($ins) {
                $ins->bind_param('ii', $uid, $pid);
                $ins->execute();
            }
        }
    }
}
header('Location: ../projects.php?pid=' . $pid);
exit;
?>
