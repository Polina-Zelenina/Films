<?php
	function checkSession() {
		if (empty($_SESSION['user_id'])) {
			if (!empty($_COOKIE['user_id'])) {
				$_SESSION['user_id'] = $_COOKIE['user_id'];
			} else {
				header("Location: /login.php");
				die();
			}
		}
	}
?>