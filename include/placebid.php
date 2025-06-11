<?php
require_once __DIR__.'/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = intval($_POST['pid'] ?? 0);
    $fid = $_SESSION['USER_ID'] ?? 0;
    $price = floatval($_POST['price'] ?? 0);
    $duration = intval($_POST['duration'] ?? 0);
    $msg = trim($_POST['msg'] ?? '');

    $stmt = $mysqli->prepare('INSERT INTO post_req (pid,fid,price,duration,msg,status) VALUES (?,?,?,?,?,"Pending")');
    if ($stmt) {
        $stmt->bind_param('iidis', $pid, $fid, $price, $duration, $msg);
        $stmt->execute();
    }
    header('Location: ../projects.php?pid=' . $pid);
    exit;
}
header('Location: ../projects.php');
?>
