<?php 

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/header.php';

 $q = trim($_GET['q'] ?? '');
 $movies = $q ? searchMovie($conn, $q): [];

?>

<main>
<section class="movie-section">
	<h1>Search Result For "<?= htmlspecialchars($q) ?>"</h1>

	<?php require __DIR__ . '/../includes/movie_table.php'; ?>

</section>
</main>
<?php require_once __DIR__ . '/../includes/footer.php';

