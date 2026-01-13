CREATE TABLE IF NOT EXISTS genres (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL);


CREATE TABLE IF NOT EXISTS movies (
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
	release_year INT NOT NULL,
	rating DECIMAL(3,1) NOT NULL,
	genre_id INT,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (genre_id) REFERENCES genres(id) ON DELETE SET NULL);


CREATE TABLE IF NOT EXISTS casts(
	id INT AUTO_INCREMENT PRIMARY KEY,
	movie_id INT,
	actor_name VARCHAR(100) NOT NULL,
	FOREIGN KEY(movie_id) REFERENCES movies(id) ON DELETE CASCADE);

ALTER TABLE genres
ADD UNIQUE KEY unique_genre_name (name);

ALTER TABLE casts
ADD UNIQUE KEY unique_movie_actor (movie_id, actor_name);



INSERT IGNORE INTO genres (name) VALUES
('Action'),
('Drama'),
('Comedy'),
('Sci-Fi'),
('Horror'),
('Thriller');

INSERT IGNORE INTO movies (title, release_year, rating, genre_id) VALUES
('RRR', 2022, 7.8, 1),
('Animal', 2023, 6.2, 2),
('Dhurandhar', 2025, 8.6, 5);

INSERT IGNORE INTO casts (movie_id, actor_name) VALUES
(1, 'Ram Charan'),
(1, 'NTR'),
(2, 'Ranbir Kapoor'),
(2, 'Tripti Dimri'),
(2, 'Anil Kapoor'),
(3, 'Ranveer Singh'),
(3, 'Arjun Rampal'),
(3, 'Sanjay Dutt'),
(3, 'Akshaye Khanna');
