<?php
require_once __DIR__.'/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = $_SESSION['USER_ID'] ?? 0;
    $title = trim($_POST['title'] ?? '');
    $detail = trim($_POST['detail'] ?? '');
    $cost = floatval($_POST['cost'] ?? 0);

    $stmt = $mysqli->prepare('INSERT INTO post_prj (cid,name,detail,cost) VALUES (?,?,?,?)');
    if ($stmt) {
        $stmt->bind_param('issd', $cid, $title, $detail, $cost);
        $stmt->execute();
    }
    header('Location: ../client.php');
    exit;
}
header('Location: ../client.php');
?>
