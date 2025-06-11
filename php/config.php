<?php

$host = 'localhost';
$user = 'codiwoob_hassan';
$pass = 'Sk@teordie2016';
$db = 'freelancing_platform';
$port = "3306";
$site = 'Codify';

$logo = 'asset/logo.png';
$favicon = 'asset/favicon.ico';



$conn = new mysqli($host, $user, $pass, $db, $port);
$mysqli = new mysqli($host, $user, $pass, $db, $port);

if ($mysqli->connect_errno) {
    echo 'Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
    exit;
}

  
?>