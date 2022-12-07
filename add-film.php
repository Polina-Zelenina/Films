<?php
	require_once 'config.php';
	require_once SRC_PATH.'checkSession.php';

	checkSession();

	if (!empty($_POST['name']) && !empty($_POST['genre']) && !empty($_POST['date']) && !empty($_POST['actors']) && !empty($_POST['description'])) {
		$name = $_POST['name'];
		$genre = $_POST['genre'];
		$date = $_POST['date'];
		$actors = $_POST['actors'];
		$description = $_POST['description'];

		$stmt = $dbh->prepare("
			INSERT INTO Films(name, genre, date, actors, description)
			VALUES (:name, :genre, :date, :actors, :description);
		");
		$addedrows = $stmt->execute([
			'name' => $name,
			'genre' => $genre,
			'date' => $date,
			'actors' => $actors,
			'description' => $description
		]);

		if (!empty($addedrows)) header('Location: /main.php');
	}

	require_once PAGES_PATH.'addFilm'.DIRECTORY_SEPARATOR.'add-film.php';
?>