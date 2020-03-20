1.
	SELECT name
	FROM movies
	WHERE year = 1995
2.
	SELECT COUNT( * ) as "Number of people played a part"
	FROM movies m
	JOIN roles r ON r.movie_id = m.id
    JOIN movies_directors md ON md.movie_id = m.id
	JOIN actors a ON a.id = r.actor_id
    JOIN directors d ON d.id = md.director_id
	WHERE m.name = 'Lost in Translation'
3.
	SELECT *
	FROM movies m
	JOIN roles r ON r.movie_id = m.id
    JOIN movies_directors md ON md.movie_id = m.id
	JOIN actors a ON a.id = r.actor_id
    JOIN directors d ON d.id = md.director_id
	WHERE m.name = 'Lost in Translation'
4.
	SELECT *
	FROM directors d
	JOIN movies_directors md ON md.director_id = d.id
	JOIN movies m ON m.id = md.movie_id
	WHERE m.name = 'Fight club'
5.
	SELECT COUNT(*) as 'Number of movies'
	FROM movies m
	JOIN movies_directors md on md.movie_id = m.id
	JOIN directors d ON d.id = md.director_id
	WHERE d.first_name = 'Clint' AND d.last_name = 'Eastwood'
6.
	SELECT *
	FROM movies m
	JOIN movies_directors md on md.movie_id = m.id
	JOIN directors d ON d.id = md.director_id
	WHERE d.first_name = 'Clint' AND d.last_name = 'Eastwood'
7.
	SELECT *
	FROM directors d
	JOIN directors_genres dg ON dg.director_id = d.id
	JOIN movies_directors md ON md.director_id = d.id
	JOIN movies m ON m.id = md.movie_id
	JOIN movies_genres mg ON mg.movie_id = m.id
	WHERE mg.genre = 'Horror' AND dg.genre = 'Horror'
8.
	SELECT *
	FROM actors a
	JOIN roles r ON r.actor_id = a.id
	JOIN movies m ON m.id = r.movie_id
	JOIN movies_directors md ON md.movie_id = m.id
	JOIN directors d ON d.id = md.director_id
	WHERE d.first_name = 'Christopher' AND d.last_name = 'Nolan'