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
$result = $mysqli->query("SELECT `lang` FROM `freelancer` WHERE `fid` = $fid");
$row  = $result && $result->num_rows ? $result->fetch_assoc() : null;
$lang = $row['lang'] ?? '';

$search = trim($_GET['q'] ?? '');
if ($search !== '') {
    $stmt = $mysqli->prepare("SELECT * FROM post_req RIGHT JOIN projects ON post_req.pid = projects.id WHERE projects.title LIKE CONCAT('%', ?, '%') OR projects.description LIKE CONCAT('%', ?, '%') ORDER BY post_req.status DESC");
    $stmt->bind_param('ss', $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $mysqli->query("SELECT * FROM post_req RIGHT JOIN projects ON post_req.pid = projects.id ORDER BY post_req.status DESC");
}

$result3 = $mysqli->query("SELECT * FROM `freelancer` WHERE `fid` = $fid");
$row3 = $result3 && $result3->num_rows ? $result3->fetch_assoc() : null;
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
    <div class="logo">Codify</div>
    <div class="user-settings">
        <img class="user-profile" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%283%29+%281%29.png" alt="">
        <div class="user-name"><?php echo $row3['name'] ?? '' ?></div>
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
