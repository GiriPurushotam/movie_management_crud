<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Movies Database</title>
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<header class="site-header">
	<nav class="navbar">
		<div class="nav-left">
		<h1 class="logo">MovieDB</h1>
		</div>

		<div class="nav-center">
			<form action="search.php" method="GET" class="search-form">
				<input type="text" name="q" placeholder="Search Movies..." required>
				<button type="submit">Search</button>
			</form>
		</div>

		<div class="nav-right">
			<a href="add.php" class="btn-add">+ Add Movie </a>
		</div>
	</nav>
</header>