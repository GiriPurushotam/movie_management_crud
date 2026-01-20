<?php
require_once __DIR__ . '/functions.php';
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Movies Database</title>
	<link rel="stylesheet" href="/movie_project/assets/css/style.css">
</head>

<body>

	<header class="site-header">
		<nav class="navbar">
			<div class="nav-left">
				<h1 class="logo"><a href="/movie_project/public/index.php">MovieDB</a></h1>
			</div>

			<div class="nav-center">
				<?php if ($currentPage !== 'login.php' && $currentPage !== 'signUp.php') : ?>
					<form action="search.php" method="GET" class="search-form">
						<input type="text" name="q" id="searchInput" placeholder="Search Movies..." required>
						<div id="autocompleteResults" class="autocomplete-results"></div>
						<button type="submit">Search</button>
					</form>
				<?php endif; ?>
			</div>

			<div class="nav-right">
				<?php if (isLoggedIn()): ?>
					<?php if ($currentPage !== 'add.php' && $currentPage !== 'edit.php'): ?>
						<a href="add.php" class="btn-add">+ Add Movie </a>
					<?php endif ?>
					<?php if ($currentPage !== 'login.php' && $currentPage !== 'signUp.php') : ?>
						<a class="btn-add" href="../public/auth/logout.php">Logout</a>
					<?php else: ?>
						<a class="btn-add" href="../public/auth/login.php">Login</a>
					<?php endif; ?>

				<?php endif; ?>
			</div>
		</nav>
	</header>