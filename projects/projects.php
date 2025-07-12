<?php
require '../include/config.php';
require '../include/db.php';

if (!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    header('Location: login.php');
    exit;
}
if (!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'freelancer') {
    header('Location: login.php');
    exit;
}

$fid = $_SESSION['USER_ID'];
// Retrieve freelancer info along with the associated profile image
$stmtInfo = $mysqli->prepare(
    'SELECT f.lang, f.name, u.profile_img FROM freelancer f
     JOIN users u ON f.fid = u.id WHERE f.fid = ?'
);
$stmtInfo->bind_param('i', $fid);
$stmtInfo->execute();
$infoRes = $stmtInfo->get_result();
$infoRow = $infoRes && $infoRes->num_rows ? $infoRes->fetch_assoc() : null;
$lang = $infoRow['lang'] ?? '';
$profileImg = $infoRow['profile_img'] ?? '';
$stmtInfo->close();

$search = trim($_GET['q'] ?? '');
if ($search !== '') {
    $stmt = $mysqli->prepare("SELECT * FROM post_req RIGHT JOIN projects ON post_req.pid = projects.id WHERE projects.title LIKE CONCAT('%', ?, '%') OR projects.description LIKE CONCAT('%', ?, '%') ORDER BY post_req.status DESC");
    $stmt->bind_param('ss', $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $mysqli->query("SELECT * FROM post_req RIGHT JOIN projects ON post_req.pid = projects.id ORDER BY post_req.status DESC");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects Dashboard</title>
    <link rel="stylesheet" href="projects.css">
</head>
<body>
<header class="header">
    <div class="logo">CELUT-GC</div>
    <div class="user-settings">
        <?php if (!empty($profileImg)): ?>
            <img class="user-profile" src="../php/images/<?= htmlspecialchars($profileImg) ?>" alt="">
        <?php endif; ?>
        <div class="user-name"><?php echo $infoRow['name'] ?? '' ?></div>
        <a style="margin-right:10px;" href="../profile.php?uid=<?=$fid?>">Profil</a>
        <a class="logout-link" href="../include/logout.php">Logout</a>
    </div>
</header>
<h1 class="page-title">Dashboard <span>Enseignant-Chercheur</span></h1>
<div class="wrapper">
    <form class="search-form" method="get">
        <input type="text" name="q" placeholder="Search projects" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>
    <div id="missions">
<?php while ($row = $result->fetch_assoc()) { ?>
        <div class="job-card">
            <div class="job-card-title"><?=ucfirst($row['title'])?></div>
            <div class="job-card-subtitle"><?=substr($row['description'], 0, 100)?></div>
            <div class="job-detail-buttons">
                <span class="detail">Cost: <?=$row['budget']?></span>
                <span class="detail"><?= htmlspecialchars($row['lang'] ?? '') ?></span>
            </div>
            <div class="job-card-buttons">
                <a class="btn" href="../projects.php?pid=<?=$row['id']?>">Apply Now</a>
                <a class="btn" href="../users.php?pid=<?=$row['id']?>&cid=<?=$row['user_id']?>">Chat</a>
            </div>
        </div>
<?php } ?>
    </div>
</div>
</body>
</html>
