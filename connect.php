<?php

  require_once 'scripts/app_config.php';

  $link = mysqli_connect(DATABASE_HOST, USERNAME, PASSWORD, DATABASE_NAME)
    or handle_error("возникла проблема, связанная с подключением к базе данных, " .
      "содержащей нужную информацию.",
    mysql_error());

  echo "<p>Connected to MySQL!</p>";

  echo "<p>Connected to MySQL, using database " . DATABASE_NAME . ".</p>";

  $result = mysqli_query($link,"SHOW TABLES;");

  if (!$result) {
     handle_error("<p>Error in listing tables: " . mysqli_error($link) . "</p>");
  }

  echo "<p>Tables in database:</p>";
  echo "<ul>";
  while ($row = mysqli_fetch_row($result)) {
    echo "<li>Table: {$row[0]}</li>";
  }
  echo "</ul>";

?>
