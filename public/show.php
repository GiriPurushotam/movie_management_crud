<?php require_once __DIR__ . '/../includes/functions.php';
?>
<?php if ($flash = flashMessage()): ?>
	<div class="<?= $flash['type'] === 'error' ? 'error-flash-msg' : 'flash-msg' ?>"><?= htmlspecialchars($flash['message']) ?></div>
<?php endif; ?>

<?php
$movies = getAllMovies($conn);
?>

<section class="movie-section">
	<h1>Trending Movies</h1>

	<?php require __DIR__ . '/../includes/movie_table.php'; ?>

</section>