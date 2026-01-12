<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/header.php';

if(!isset($_GET['id'])) {
	header("Location: index.php");
	exit;
}

$movie = editMovie($conn, $_GET['id']);
$genres = getGenres($conn);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	updateMovie(
		$conn,
		$movie['id'],
		$_POST['title'],
		$_POST['release_year'],
		$_POST['rating'],
		$_POST['genre_id'],
		$_POST['casts'],

	);

	header("Location: index.php?updated=1");
}

if(!$movie) {
	header("Location: index.php");
	exit;
}
?>

<main class="form-page">
<section class="form-section">
	
	<h1>Edit Movie</h1>

	<form method="POST" class="movie-form">
		<div class="form-group">
			<label for="">Movie Title</label>
			<input type="text" name="title" value="<?= htmlspecialchars($movie['title']) ?>" required>
		</div>

		<div class="form-group">
			<label for="">Release Year</label>
			<input type="number" name="release_year" value="<?= htmlspecialchars($movie['release_year']) ?>" required>
		</div>

		<div class="form-group">
			<label for="">Rating</label>
			<input type="number" step="0.1" name="rating" value="<?= htmlspecialchars($movie['rating']) ?>" required>
		</div>

		<div class="form-group">
			<label for="">Genre</label>
			<select name="genre_id" id="" required>
				<?php foreach($genres as $genre): ?>
				<option value="<?= $genre['id']?>" <?= $genre['id'] == $movie['genre_id'] ? 'selected' : '' ?>> <?= htmlspecialchars($genre['name']) ?></option>
			<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label for="">Cast</label>
			<input type="text" name="casts" value="<?= htmlspecialchars($movie['casts']) ?>">
		</div>

		<div class="form-actions">
			<button class="btn-save" type="submit">Update Movie</button>
			<a href="index.php" class="btn-cancel">Cancel</a>
		</div>
	</form>
</section>
</main>

<?php 
require_once __DIR__ . '/../includes/footer.php';
?>
