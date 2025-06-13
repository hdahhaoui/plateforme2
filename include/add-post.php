<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uid        = $_SESSION['USER_ID'] ?? 0;
    $title      = trim($_POST['name'] ?? '');
    $desc       = trim($_POST['about'] ?? '');
    $budget     = floatval($_POST['cost'] ?? 0);

    // Ensure the projects table exists in case the SQL schema has not been imported

    $createQuery = "CREATE TABLE IF NOT EXISTS projects (

        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        budget DECIMAL(10,2) DEFAULT 0,
        deadline DATE,
        status VARCHAR(20) DEFAULT 'open',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )";
    $mysqli->query($createQuery);


    $stmt = $mysqli->prepare('INSERT INTO projects (user_id, title, description, budget, status) VALUES (?,?,?,?,\'open\')');

    if ($stmt) {
        $stmt->bind_param('issd', $uid, $title, $desc, $budget);
        $stmt->execute();
        $newId = $mysqli->insert_id;
    }

    $_SESSION['msg'] = [
        'type' => 'success',
        'msg'  => 'Project posted successfully and will be visible to freelancers.'
    ];

    header('Location: ../client.php');
    exit;
}

header('Location: ../client.php');
?>
