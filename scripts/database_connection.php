<?php
	require_once 'app_config.php';

	$link = mysqli_connect(DATABASE_HOST, USERNAME, PASSWORD, DATABASE_NAME)
		 handle_error ("<p>Ошибка подключения к базе данных: " .
			mysqli_error() . "</p>");

 ?>