<?php


$host = "localhost";
$db   = "movie";
$user = "root";
$pass = "";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn) {
	die("Database Connection Failed");
}
