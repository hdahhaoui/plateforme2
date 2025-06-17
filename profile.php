<?php
require 'include/config.php';
require 'include/db.php';

// Determine which user to display
$uid = isset($_GET['uid']) ? (int)$_GET['uid'] : ($_SESSION['USER_ID'] ?? 0);
if (!$uid) {
    exit('User ID missing.');
}

$stmt = $mysqli->prepare('SELECT id, name, email, type, phone, address, profile_img, created_at FROM users WHERE id = ?');
$stmt->bind_param('i', $uid);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
if (!$user) {
    exit('User not found.');
}

$projectCount = 0;
if ($user['type'] === 'client') {
    $countStmt = $mysqli->prepare('SELECT COUNT(*) FROM projects WHERE user_id = ?');
    $countStmt->bind_param('i', $uid);
    $countStmt->execute();
    $countStmt->bind_result($projectCount);
    $countStmt->fetch();
    $countStmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil utilisateur</title>
    <style>
        body {font-family: Arial, sans-serif; margin:20px;}
        .container {max-width:600px; margin:auto;}
        .profile-img {width:150px; height:150px; object-fit:cover; border-radius:50%;}
    </style>
</head>
<body>
<?php require 'include/header.php'; ?>
<div class="container">
    <h2><?= htmlspecialchars($user['name']) ?></h2>
    <?php if (!empty($user['profile_img'])): ?>
        <img class="profile-img" src="php/images/<?= htmlspecialchars($user['profile_img']) ?>" alt="Profile image">
    <?php endif; ?>
    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
    <p>Type: <?= htmlspecialchars($user['type']) ?></p>
    <?php if ($user['phone']): ?><p>Téléphone: <?= htmlspecialchars($user['phone']) ?></p><?php endif; ?>
    <?php if ($user['address']): ?><p>Adresse: <?= htmlspecialchars($user['address']) ?></p><?php endif; ?>
    <p>Membre depuis: <?= htmlspecialchars($user['created_at']) ?></p>
    <?php if ($user['type'] === 'client'): ?>
        <p>Projets publiés: <?= $projectCount ?></p>
    <?php endif; ?>
</div>
<?php require 'include/footer.php'; ?>
</body>
</html>
