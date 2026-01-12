<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';


if(isset($_GET['id'])) {
	deleteMovies($conn, $_GET['id']);
	header("Location: index.php?deleted=1");
	exit;
}