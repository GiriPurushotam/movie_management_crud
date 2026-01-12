<?php

require_once __DIR__ . '/../config/db.php';

function getAllMovies($conn) {

	

	$sql = "SELECT movies.id, movies.title, movies.release_year, movies.rating, genres.name AS genre, IFNULL(GROUP_CONCAT(casts.actor_name SEPARATOR ', '), '') AS casts FROM movies
	LEFT JOIN genres ON movies.genre_id = genres.id LEFT JOIN casts ON movies.id = casts.movie_id
	GROUP BY movies.id ORDER BY movies.id DESC";

	$result = mysqli_query($conn, $sql);

	if(!$result) {
		return [];
	}

	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getGenres($conn) {
$result = mysqli_query($conn, "SELECT id, name FROM genres ORDER BY name ASC");
if($result) {
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

}


function addMovie($conn, $title, $release_year, $rating, $genre_id, $casts) {

	//** Adding movie using prepared statements to avoid sql injection **//

	$stmt = mysqli_prepare($conn, "INSERT INTO movies (title, release_year, rating, genre_id) VALUES (?, ?, ?, ?)");

	mysqli_stmt_bind_param($stmt, "sidi", $title, $release_year, $rating, $genre_id);

	mysqli_stmt_execute($stmt);

	$movie_id = mysqli_insert_id($conn);
	mysqli_stmt_close($stmt);


	//** Adding casts ** //

	if(!empty($casts)) {
		$castArray = array_map('trim', explode(',', $casts));

		$castStmt = mysqli_prepare($conn, "INSERT IGNORE INTO casts (movie_id, actor_name) VALUES (?, ?)");
		foreach($castArray as $actor) {
			if($actor !== '') {
				mysqli_stmt_bind_param($castStmt, 'is', $movie_id, $actor);
				mysqli_stmt_execute($castStmt);
			}
		}

		mysqli_stmt_close($castStmt);

	}

	header("Location: index.php?success=1");
	exit;

}

function deleteMovies($conn, $id) {
	$stmt = mysqli_prepare($conn, "DELETE FROM movies WHERE id=?");
	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	return true;
}

function flashMessage() {
	if(isset($_GET['success'])) {
		return 'Movie Added Successfully';
	}

	if(isset($_GET['deleted'])) {
		return 'Movie Deleted Successfully';
	}

	if(isset($_GET['updated'])) {
		return 'Movie Updated Successfully';
	}

	return null;
}

function editMovie($conn, $id) {
	$stmt = mysqli_prepare($conn, "SELECT movies.*, GROUP_CONCAT(casts.actor_name SEPARATOR ', ' ) AS casts FROM movies LEFT JOIN casts ON movies.id = casts.movie_id WHERE movies.id = ? GROUP BY movies.id");
	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);
	$movie = mysqli_fetch_assoc($result);
	mysqli_stmt_close($stmt);

	return $movie;
}

function updateMovie($conn, $id, $title, $release_year, $rating, $genre_id, $casts = '') {
	//** Updating Movies **//

	$stmt = mysqli_prepare($conn, "UPDATE movies SET title = ?, release_year = ?, rating = ?, genre_id = ? WHERE id = ?");

	mysqli_stmt_bind_param($stmt, 'sidis', $title, $release_year, $rating, $genre_id, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	//** Updating Casts **// 

	$delCast = mysqli_prepare($conn, "DELETE FROM casts WHERE movie_id = ?");
	mysqli_stmt_bind_param($delCast, 'i', $id);
	mysqli_stmt_execute($delCast);
	mysqli_stmt_close($delCast);

	if(!empty($casts)) {
		$castArray = array_map('trim', explode(',', $casts));
		$insertCast = mysqli_prepare($conn, "INSERT IGNORE INTO casts (movie_id, actor_name) VALUES (?, ?)");

		foreach($castArray as $actor) {
			if($actor !== '') {
				mysqli_stmt_bind_param($insertCast, 'is', $id, $actor);
				mysqli_stmt_execute($insertCast);
			}
		}

		mysqli_stmt_close($insertCast);

	}


}