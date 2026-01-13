<?php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';

$q = trim($_GET['q'] ?? '');

if($q === '') {
	echo json_encode([]);
	exit;
}

$movies = searchMovie($conn, $q);
echo json_encode($movies);

