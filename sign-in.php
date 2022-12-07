<?php
	require_once 'config.php';

	if (!empty($_POST['login']) && !empty($_POST['password'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];

		$stmt = $dbh->prepare("
			SELECT * FROM Users
			WHERE login = :login AND password = :password
		");

		$stmt->execute(['login' => $login, 'password' => $password]);

		$executedChecking = $stmt->fetchAll();

		if (!empty($executedChecking)) {
			$_SESSION['user_id'] = $executedChecking[0]['id'];
			setcookie("user_id", $executedChecking[0]['id'], time()+3600 * 24 * 7);
			header('Location: /main.php');
			die();
		}
	}

	require_once PAGES_PATH.'auth'.DIRECTORY_SEPARATOR.'sign-in.php';
?>