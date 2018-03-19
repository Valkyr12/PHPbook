<?php
	//Database connection settings
	define('DATABASE_HOST', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '');
	define('DATABASE_NAME', 'form_info');

	// Установка режима отладки
	define("DEBUG_MODE", true);
	// Константы подключения к базе данных
	// Выдача отчетов об ошибках
	if (DEBUG_MODE) {
		error_reporting(E_ALL);
	} else {
	// Выключение выдачи отчетов об ошибках
		error_reporting(0);
	}

	function debug_print($message) {
		if (DEBUG_MODE) {
			echo $message;
		}
	}

	function handle_error($user_error_message, $system_error_message) {
		header("Location: scripts/show_error.php?" .
				"error_message={$user_error_message}&" .
				"system_error_message={$system_error_message}");
		exit();
	}
 ?>