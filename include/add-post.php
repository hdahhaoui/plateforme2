<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid      = $_SESSION['USER_ID'] ?? 0;
    $name     = trim($_POST['name'] ?? '');
    $category = trim($_POST['prjtype'] ?? '');
    $detail   = trim($_POST['about'] ?? '');
    $cost     = floatval($_POST['cost'] ?? 0);

    // Ensure the projects table exists in case the SQL schema has not been imported
    $createQuery = "CREATE TABLE IF NOT EXISTS post_prj (
        pid INT AUTO_INCREMENT PRIMARY KEY,
        cid INT NOT NULL,
        fid INT DEFAULT NULL,
        name VARCHAR(255) NOT NULL,
        category VARCHAR(100),
        detail TEXT,
        lang VARCHAR(255),
        cost DECIMAL(10,2) DEFAULT 0,
        duration INT,
        status VARCHAR(50),
        file VARCHAR(255),
        FOREIGN KEY (cid) REFERENCES client(cid) ON DELETE CASCADE,
        FOREIGN KEY (fid) REFERENCES freelancer(fid) ON DELETE SET NULL
    )";
    $mysqli->query($createQuery);

    $stmt = $mysqli->prepare('INSERT INTO post_prj (cid, name, category, detail, cost) VALUES (?,?,?,?,?)');
    if ($stmt) {
        $stmt->bind_param('isssd', $cid, $name, $category, $detail, $cost);
        $stmt->execute();
    }

    header('Location: ../client.php');
    exit;
}

header('Location: ../client.php');
?>
