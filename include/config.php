<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'gc_platform';
$port = 3306;
$site = 'CELUT-GC';
$logo = "img/logo-celutgc.png";
$favicon = 'assets/favicon.ico';

$conn = new mysqli($host, $user, $pass, $db, $port);
$mysqli = $conn;
if ($mysqli->connect_errno) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Automatically initialize database schema if tables are missing
require_once __DIR__ . '/init_db.php';
initializeDatabase($mysqli, dirname(__DIR__) . '/db/schema.sql');
?>
