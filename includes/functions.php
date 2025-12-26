<?php

require_once __DIR__ . '/../config/db.php';

function getAllMovies($conn) {

	

	$sql = "SELECT movies.id, movies.title, movies.release_year, movies.rating, genres.name AS genre, IFNULL(GROUP_CONCAT(casts.actor_name SEPARATOR ', '), '') AS casts FROM movies
	LEFT JOIN genres ON movies.genre_id = genres.id LEFT JOIN casts ON movies.id = casts.movie_id
	GROUP BY movies.id ORDER BY movies.title ASC";

	$result = mysqli_query($conn, $sql);

	if(!$result) {
		return [];
	}

	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}