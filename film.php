<?php
	require_once 'config.php';
	require_once SRC_PATH.'checkSession.php';

	checkSession();

	$filmDetail;

	if (!empty($_GET['id'])) {
		$filmId = $_GET['id'];

		$stmt = $dbh->prepare("
			SELECT * FROM Films
			WHERE id = :id
		");
		$stmt->execute(['id' => $filmId]);
		$executedChecking = $stmt->fetchAll();

		if (!empty($executedChecking)) $filmDetail = $executedChecking;
	}

	require_once PAGES_PATH.'filmDetail'.DIRECTORY_SEPARATOR.'filmDetail.php';
?>