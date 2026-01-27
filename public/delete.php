<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/functions.php';
requireAuth();


if (isset($_GET['id'])) {
	deleteMovies($conn, $_GET['id']);
	setFlashMessage('Movie deleted successfully');
	header("Location: " . BASE_PATH . "/public/index.php");
	exit;
}
