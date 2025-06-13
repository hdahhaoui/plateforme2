<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/db.php';

$username = '';
if (isset($_SESSION['USER_ID'], $_SESSION['USER_TYPE'])) {
    $uid = $_SESSION['USER_ID'];
    $type = $_SESSION['USER_TYPE'];
    if ($type === 'client') {
        $stmt = $mysqli->prepare('SELECT name FROM client WHERE cid=?');
    } else {
        $stmt = $mysqli->prepare('SELECT name FROM freelancer WHERE fid=?');
    }
    if ($stmt) {
        $stmt->bind_param('i', $uid);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            $username = $row['name'];
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <title><?= isset($site) ? $site : 'Codify' ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/index.php">Codify</a>
  <?php if ($username): ?>
  <div class="ml-auto d-flex align-items-center">
    <span class="navbar-text mr-3"><?php echo htmlspecialchars($username); ?></span>
    <a class="btn btn-outline-danger btn-sm" href="/include/logout.php">Logout</a>
  </div>
  <?php endif; ?>
</nav>
