<?php if (empty($movies)): ?>
	<p>No movies available</p>
<?php else: ?>
	<table class="movie-table" border="1" cellpadding="10">
		<thead>
			<tr>
				<th>Title</th>
				<th>Release Year</th>
				<th>Genre</th>
				<th>Cast</th>
				<th>Rating</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($movies as $movie): ?>
				<tr>
					<td class="movie-cell">
						<?php if (!empty($movie['image'])) : ?>
							<img src="/movie_project/public/uploads/<?= htmlspecialchars($movie['image']) ?>" alt="<?= htmlspecialchars($movie['title']) ?>" class="movie-thumb">
						<?php endif; ?>
						<div class="movie-title">
							<?= htmlspecialchars($movie['title']) ?>
						</div>
					</td>
					<td><?= htmlspecialchars($movie['release_year']) ?></td>
					<td><?= htmlspecialchars($movie['genre']) ?></td>
					<td><?= htmlspecialchars($movie['casts'] ?? '') ?></td>
					<td><?= htmlspecialchars($movie['rating'] ?? '') ?></td>
					<td>
						<a href="edit.php?id=<?= $movie['id'] ?>" class="btn-edit"> Edit </a>
						<a href="delete.php?id=<?= $movie['id'] ?>" class="btn-delete" onclick="return confirm('Delete this movie')">Delete </a>

					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>