<?php 
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/header.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	addMovie(
		$conn,
		$_POST['title'],
		$_POST['release_year'],
		$_POST['rating'],
		$_POST['genre_id'],
		$_POST['casts'],
	);
}

$genres = getGenres($conn);
?>

<main class="form-page">
<section class="form-section">
	
	<h1>Add Movie</h1>

	<form method="POST" class="movie-form">
		<div class="form-group">
			<label for="">Movie Title</label>
			<input type="text" name="title" required>
		</div>

		<div class="form-group">
			<label for="">Release Year</label>
			<input type="number" name="release_year" required>
		</div>

		<div class="form-group">
			<label for="">Rating</label>
			<input type="number" step="0.1" name="rating" required>
		</div>

		<div class="form-group">
			<label for="">Genre</label>
			<select name="genre_id" id="" required>
				<option value="">Select Genre</option>
				<?php foreach($genres as $genre): ?>
					<option value="<?= $genre['id'] ?>"><?= htmlspecialchars($genre['name']) ?></option>
				<?php  endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label for="">Cast</label>
			<input type="text" name="casts" placeholder="Actor 1, Actor 2">
		</div>

		<div class="form-actions">
			<button class="btn-save" type="submit">Save Movie</button>
			<a href="index.php" class="btn-cancel">Cancel</a>
		</div>
	</form>
</section>
</main>


<?php
 require_once __DIR__ . '/../includes/footer.php';
?>