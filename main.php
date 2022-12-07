<?php
	require_once 'config.php';
	require_once SRC_PATH.'checkSession.php';

	checkSession();

	$films;

	if (!empty($_GET['search'])) {
		$search = $_GET['search'];

		$stmt = $dbh->prepare('
			SELECT * FROM Films
			WHERE name LIKE CONCAT("%", :value, "%");
		');
		$stmt->execute(['value' => $search]);

		$films = $stmt->fetchAll();
	} else {
		$stmt = $dbh->prepare("
			SELECT fi.id, fi.name, fi.description, u.id as user_id FROM Films as fi
			LEFT JOIN Favourites AS fa ON fa.film_id = fi.id
			LEFT JOIN Users as u ON fa.user_id = u.id;
		");
		$stmt->execute();

		$films = $stmt->fetchAll();
	}

	require_once PAGES_PATH.'films'.DIRECTORY_SEPARATOR.'main.php';
?>