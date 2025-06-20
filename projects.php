<?php
require 'include/config.php';
require 'include/db.php';

if (!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    header('Location: login.php');
    exit;
}

$pidParam = $_GET['pid'] ?? '';
$pid = filter_var($pidParam, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if (!$pid) {
    exit('Project ID missing or invalid.');
}

$colCheck = $mysqli->query("SHOW COLUMNS FROM users LIKE 'username'");
$nameExpr = ($colCheck && $colCheck->num_rows > 0)
    ? 'COALESCE(u.name, u.username)'
    : 'u.name';
$query = "SELECT p.id, p.user_id, p.title, p.description, p.budget, p.deadline, p.status, p.created_at,
            $nameExpr AS client_name, u.email AS client_email,
            u.profile_img, u.created_at AS user_created,
            c.address, c.phone
          FROM projects p
          JOIN users u ON p.user_id = u.id
          LEFT JOIN client c ON u.id = c.cid
          WHERE p.id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $pid);
$stmt->execute();
$result = $stmt->get_result();
if (!$result->num_rows) {
    exit('Project not found.');
}
$row = $result->fetch_assoc();

// count number of projects posted by the client
$countStmt = $mysqli->prepare('SELECT COUNT(*) FROM projects WHERE user_id = ?');
$countStmt->bind_param('i', $row['user_id']);
$countStmt->execute();
$countStmt->bind_result($clientProjects);
$countStmt->fetch();
$countStmt->close();
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
<?php require 'include/header.php'; ?>
<div class="container">
    <h1 class="project-title"><?= htmlspecialchars($row['title']) ?></h1>
    <div class="project-meta">
        <span>
            Client: <a href="profile.php?uid=<?= $row['user_id'] ?>"><?= htmlspecialchars($row['client_name']) ?></a>
            (<?= htmlspecialchars($row['client_email']) ?>)
        </span>
        <?php if (!empty($row['profile_img'])): ?>
            <img src="php/images/<?= htmlspecialchars($row['profile_img']) ?>" alt="profile" style="width:50px;height:50px;border-radius:50%;">
        <?php endif; ?>
        <span>Budget: $<?= htmlspecialchars($row['budget']) ?></span>
        <span>Deadline: <?= htmlspecialchars($row['deadline']) ?></span>
        <span>Status: <?= htmlspecialchars($row['status']) ?></span>
        <span>Posted on: <?= htmlspecialchars($row['created_at']) ?></span>
        <span>Member since: <?= htmlspecialchars($row['user_created']) ?></span>
        <span>Projects posted: <?= $clientProjects ?></span>
    </div>
    <button id="contactBtn">Voir les coordonnées du client</button>
    <div id="contactInfo" style="display:none; margin-top:10px;">
        <p>Adresse: <?= htmlspecialchars($row['address'] ?? '') ?></p>
        <p>Téléphone: <?= htmlspecialchars($row['phone'] ?? '') ?></p>
    </div>
    <div class="project-description"><?= htmlspecialchars($row['description']) ?></div>
</div>
<script>
document.getElementById('contactBtn').addEventListener('click', function(){
    var info = document.getElementById('contactInfo');
    info.style.display = info.style.display === 'none' ? 'block' : 'none';
});
</script>
</body>
</html>
