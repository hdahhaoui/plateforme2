<?php
// Ensure DB connection and session are available
require_once __DIR__ . '/db.php';
// Retrieve the logged in user name and profile picture when possible
$username = '';
$profileImg = '';
if (isset($_SESSION['USER_ID'])) {
    $uid = $_SESSION['USER_ID'];
    if (isset($mysqli)) {
        $stmt = $mysqli->prepare('SELECT * FROM users WHERE id=?');
        if ($stmt) {
            $stmt->bind_param('i', $uid);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($row = $res->fetch_assoc()) {
                if (isset($row['name'])) {
                    $username = $row['name'];
                } elseif (isset($row['username'])) {
                    $username = $row['username'];
                }
                $profileImg = $row['profile_img'] ?? '';
            }
            $stmt->close();
        }
    }
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/index.php">Codify</a>
  <?php if ($username): ?>
  <div class="ml-auto d-flex align-items-center">
    <?php if ($profileImg): ?>
        <img src="php/images/<?= htmlspecialchars($profileImg) ?>" alt="profile" style="width:32px;height:32px;border-radius:50%;margin-right:10px;">
    <?php endif; ?>
    <span class="navbar-text mr-3"><?php echo htmlspecialchars($username); ?></span>
    <a class="btn btn-outline-danger btn-sm" href="include/logout.php">Logout</a>
  </div>
  <?php endif; ?>
</nav>
