<?php
	require_once '..'.DIRECTORY_SEPARATOR.'config.php';
	
	$json = file_get_contents('php://input');
	$data = json_decode($json, true);

	if (!empty($data['id']) && !empty($data['userId']) && isset($data['isChecked'])) {
		$filmId = $data['id'];
		$userId = $data['userId'];
		$isChecked = $data['isChecked'];

		if ($isChecked) {
			$stmt = $dbh->prepare("
				INSERT INTO Favourites(user_id, film_id)
				VALUES (:user_id, :film_id)
			");
			$dbh->beginTransaction();
			$stmt->execute(['user_id' => $userId, 'film_id' => $filmId]);
			$dbh->commit();

			if ($dbh->lastInsertId()) {
				http_response_code(200);
			}
		} else {
			$stmt = $dbh->prepare("
				DELETE FROM Favourites
				WHERE user_id=:userId AND film_id=:filmId
			");
			$stmt->execute(['userId' => $userId, 'filmId' => $filmId]);
			http_response_code(200);
		}
	} else {
		http_response_code(400);
	}

?>