<?php
	require_once 'config.php';
	require_once SRC_PATH.'checkSession.php';

	checkSession();

	$userId = $_COOKIE['user_id'];

	$stmt = $dbh->prepare("
		SELECT fi.id, fi.name, fi.description, u.id as user_id FROM Films as fi
		JOIN Favourites AS fa ON fa.film_id = fi.id
		JOIN Users as u ON fa.user_id = u.id
		WHERE u.id = :userId
	");
	$stmt->execute(['userId' => $userId]);

	$films = $stmt->fetchAll();

	require_once PAGES_PATH.'favourites'.DIRECTORY_SEPARATOR.'favourites.php';
?>