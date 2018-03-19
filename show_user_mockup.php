<?php

  require_once 'scripts/database_connection.php';

  // $first_name = "К. Дж.";
  // $last_name = "Вильсон";
  // $user_image = "/еще/не/создано.jpg";
  // $bio = "Кристофер Джон Вильсон - старт-питчер бейсбольной
  //         команды Техас Рейнджерс. После нескольких лет выступлений
  //         в качестве релиф-питчера, в 2010 году дебютировал в
  //         качестве стартера Рейнджерс, а в 2011 году стал штатным
  //         стартером команды. Левша, известен своим крутым характером,
  //         толстыми ожерельями из веревок и целым набором устрашающих
  //         противника вещей. </p>
  //         <p>Кристофер Джон не только бейсболист, но и автогонщик, и
  //         предпочитает домашнему безделью южноафриканское сафари.";
  // $email = "wilson@texasrangers.com";
  // $facebook_url = "http://www.facebook.com/pages/CJ-Wilson/127083957307281";
  // $twitter_url = "http://www.twitter.com/str8edgeracer";

  $user_id = $_REQUEST['user_id'];

    // Создание инструкции SELECT
  $select_query = "SELECT * FROM users WHERE user_id = " . $user_id;
  // Запуск запроса
  $result = mysqli_query($link, $select_query);

  if ($result) {
    $row            = mysqli_fetch_array($result);
    $first_name     = $row['first_name'];
    $last_name      = $row['last_name'];
    $bio            = preg_replace("/[\r\n]+/", "</p><p>", $row['bio']);
    $email          = $row['email'];
    $facebook_url   = $row['facebook_url'];
    $twitter_handle = $row['twitter_handle'];

    $position = preg_match("/facebook.com/", $facebook_url);

    // Превращение $twitter_handle в URL
    $twitter_url = "http://www.twitter.com/" . substr($twitter_handle, $position + 1);
    // Для последующего добавления
    $user_image = "images/missing_user.png";
  } else {
     handle_error("Ошибка обнаружения пользователя с ID {$user_id}");
  }

?>

<html>
 <head>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
 </head>

 <body>
  <div id="header"><h1>PHP & MySQL: The Missing Manual</h1></div>
  <div id="example">User Profile</div>

  <div id="content">
    <div class="user_profile">
      <h1><?php echo $first_name . " " . $last_name ; ?></h1>
      <p>
        <img src="<?php echo $user_image; ?>" class="user_pic" />
        <?php echo $bio; ?></p>
      <p class="contact_info">Get in touch with <?php echo $first_name; ?>:</p>
      <ul>
        <li>...by emailing them at <a href="<?php echo $email; ?>">wilson@texasrangers.com</a></li>
        <li>...by <a href="<?php echo $facebook_url; ?>">checking them out on Facebook</a></li>
        <li>...by <a href="<?php echo $twitter_url; ?>">following them on Twitter</a></li>
      </ul>
    </div>
  </div>

  <div id="footer"></div>
 </body>
</html>
