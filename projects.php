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

$colRes = $mysqli->query("SHOW COLUMNS FROM projects LIKE 'file'");
$hasFile = $colRes && $colRes->num_rows > 0;

$selectFields = "p.id, p.title, p.description, p.budget, p.deadline, p.status, p.created_at";
if ($hasFile) {
    $selectFields .= ", p.file";
}
$selectFields .= ", u.username AS client_name, u.email AS client_email";

$query = "SELECT $selectFields FROM projects p JOIN users u ON p.user_id = u.id WHERE p.id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $pid);
$stmt->execute();
$result = $stmt->get_result();
if (!$result->num_rows) {
    exit('Project not found.');
}
$row = $result->fetch_assoc();

$favStmt = $mysqli->prepare('SELECT id FROM favorites WHERE user_id=? AND project_id=?');
$favStmt->bind_param('ii', $_SESSION['USER_ID'], $pid);
$favStmt->execute();
$isFavorite = $favStmt->get_result()->num_rows > 0;
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
</div>
<div class="container">
    <div class="project-description"><?= htmlspecialchars($row['description']) ?></div>
    <?php if ($hasFile && !empty($row["file"]) && file_exists($row["file"])): ?>
        <p><a href="<?= htmlspecialchars($row["file"]) ?>" download>Download attached file</a></p>
    <?php endif; ?>

    <form method="post" action="include/favorite.php" style="margin-bottom:15px;">
        <input type="hidden" name="pid" value="<?= $pid ?>">
        <button type="submit"><?= $isFavorite ? 'Unwatch' : 'Add to favorites' ?></button>
    </form>

    <form method="post" action="include/placebid.php">
        <input type="hidden" name="pid" value="<?= $pid ?>">
        <input type="hidden" name="price" value="0">
        <div>
            <label>Duration (days): <input type="number" name="duration" required></label>
        </div>
        <div>
            <label>Message (optional):<br>
                <textarea name="msg" rows="4" cols="50"></textarea>
            </label>
        </div>
        <button type="submit">Submit Proposal</button>
    </form>
</div>
</body>
</html>
