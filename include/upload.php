<?php
require_once __DIR__.'/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = intval($_POST['pid'] ?? 0);
    if (!empty($_FILES['prj']['name'])) {
        $targetDir = '../uploads/';
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $filename = basename($_FILES['prj']['name']);
        $path = $targetDir . time() . '_' . $filename;
        if (move_uploaded_file($_FILES['prj']['tmp_name'], $path)) {
            $mysqli->query("ALTER TABLE projects ADD COLUMN IF NOT EXISTS file VARCHAR(255)");
            $stmt = $mysqli->prepare('UPDATE projects SET file=? WHERE id=?');
            if ($stmt) {
                $stmt->bind_param('si', $path, $pid);
                $stmt->execute();
            }
        }
    }
}
header('Location: ../projects.php?pid=' . $pid);
exit;
?>
