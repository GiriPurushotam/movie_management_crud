<?php if($msg = flashMessage()): ?>
<div class="flash-msg"><?= htmlspecialchars($msg) ?></div>
<?php endif; ?>

<?php 
$movies = getAllMovies($conn);
?>

<section class="movie-section">
	<h1>Trending Movies</h1>

	<?php require __DIR__ . '/../includes/movie_table.php'; ?>

</section>
	