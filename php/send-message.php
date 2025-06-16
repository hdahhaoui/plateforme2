<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $sender_id = $_SESSION['unique_id'];
    $receiver_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $project_id = intval($_POST['project_id'] ?? 0);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    if(!empty($message)){
        $sql = mysqli_query($conn, "INSERT INTO messages (project_id, sender_id, receiver_id, content) VALUES ({$project_id}, {$sender_id}, {$receiver_id}, '{$message}')");
    }
}
?>
