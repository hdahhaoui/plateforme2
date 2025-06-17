<?php
require 'include/config.php';
require 'include/db.php';

if (!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    header('Location: login.php');
    exit;
}

$pid = (int) ($_GET['pid'] ?? 0);
if (!$pid) {
    exit('Project ID missing.');
}

$stmt = $mysqli->prepare(
    "SELECT p.id, p.title, p.description, p.budget, p.deadline, p.status, p.created_at, u.username AS client_name, u.email AS client_email
     FROM projects p JOIN users u ON p.user_id = u.id WHERE p.id = ?"
);
$stmt->bind_param('i', $pid);
$stmt->execute();
$result = $stmt->get_result();
if (!$result->num_rows) {
    exit('Project not found.');
}
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($row['title']) ?> - Project Details</title>
    <style>
        body {font-family: Arial, sans-serif; margin: 20px;}
        .container {max-width: 800px; margin: auto;}
        .project-title {font-size: 2em; margin-bottom: 10px;}
        .project-meta {color: #555; margin-bottom: 20px;}
        .project-description {margin-bottom: 20px; white-space: pre-wrap;}
        .project-meta span {display: block;}
    </style>
</head>
<body>
<div class="container">
    <h1 class="project-title"><?= htmlspecialchars($row['title']) ?></h1>
    <div class="project-meta">
        <span>Client: <?= htmlspecialchars($row['client_name']) ?> (<?= htmlspecialchars($row['client_email']) ?>)</span>
        <span>Budget: $<?= htmlspecialchars($row['budget']) ?></span>
        <span>Deadline: <?= htmlspecialchars($row['deadline']) ?></span>
        <span>Status: <?= htmlspecialchars($row['status']) ?></span>
        <span>Posted on: <?= htmlspecialchars($row['created_at']) ?></span>
    </div>
    <div class="project-description"><?= htmlspecialchars($row['description']) ?></div>
</div>
</body>
</html>
