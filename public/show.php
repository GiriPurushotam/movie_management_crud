<?php 
$movies = getAllMovies($conn);
?>

<section class="movie-section">
	<h1>Trending Movies</h1>

	<?php if(empty($movies)): ?>
		<p>No movies available</p>
	<?php else: ?>
		<table class="movie-table" border="1" cellpadding="10">
			<thead>
				<tr>
					<th>Title</th>
					<th>Release Year</th>
					<th>Genre</th>
					<th>Cast</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($movies as $movie): ?>
				<tr>
					<td><?= htmlspecialchars($movie['title']) ?></td>
					<td><?= htmlspecialchars($movie['release_year']) ?></td>
					<td><?= htmlspecialchars($movie['genre']) ?></td>
					<td><?= htmlspecialchars($movie['casts'] ?? '') ?></td>
					<td>
						<a href="edit.php?id=<?= $movie['id'] ?>" class="btn-edit"> Edit </a>
						<a href="delete.php?id=<?= $movie['id'] ?>" class="btn-delete" onclick="return confirm('Delete this movie')">Delete </a>
						
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	<?php endif ?>
	</section>
	