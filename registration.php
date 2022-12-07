<?php
    require_once 'config.php';

	if (!empty($_POST['login']) && !empty($_POST['password'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];

		if (strlen($login) >= 6 && strlen($password) >= 8) {
			$stmt = $dbh->prepare("
				SELECT * FROM Users
				WHERE login = :login
			");
			$stmt->execute(['login' => $login]);
			$executedChecking = $stmt->fetch();

			if (empty($executedChecking)) {
				$stmt = $dbh->prepare("
					INSERT INTO Users(login, password)
					VALUES (:login, :password)
				");
				$dbh->beginTransaction();
				$stmt->execute(['login' => $login, 'password' => $password]);
				$dbh->commit();

				if (dbh->lastInsertId()) {
					$_SESSION['user_id'] = $dbh->lastInsertId();
					header('Location: /main.php');
				}
			}
		}
	}

	require_once PAGES_PATH.'auth'.DIRECTORY_SEPARATOR.'registration.php';
?>

