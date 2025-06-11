<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'freelancing_platform';
$port = 3306;
$site = 'Codify';
$logo = 'assets/logo.png';
$favicon = 'assets/favicon.ico';

$conn = new mysqli($host, $user, $pass, $db, $port);
$mysqli = $conn;
if ($mysqli->connect_errno) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>
