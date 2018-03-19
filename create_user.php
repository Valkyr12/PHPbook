<?php

require_once 'scripts/database_connection.php';

$first_name = trim($_REQUEST['first_name']);
$last_name = trim($_REQUEST['last_name']);
$email = trim($_REQUEST['email']);
$facebook_url = str_replace("facebook.org", "facebook.com", trim($_REQUEST['facebook_url']));
$position = preg_match("/facebook.com/", $facebook_url);
if ($position === 0) {
  $facebook_url = "http://www.facebook.com/" . $facebook_url;
}
$twitter_handle = trim($_REQUEST['twitter_handle']);
$twitter_url = "http://www.twitter.com/";
$position = preg_match("/@/", $twitter_handle);
if ($position === 0) {
  $twitter_url = $twitter_url . $twitter_handle;
} else {
  $twitter_url = $twitter_url . substr($twitter_handle, $position + 1);
}

$bio = trim($_REQUEST['bio']);

$insert_sql = "INSERT INTO users (first_name, last_name, email, bio, facebook_url, twitter_handle)
  VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$bio}', '{$facebook_url}', '{$twitter_handle}');";

mysqli_query($link, $insert_sql)
  or handle_error(mysqli_error($link));

  // Перенаправление пользователя на страницу, показывающую информацию
  // о пользователе
  header("Location: show_user_mockup.php?user_id=" . mysqli_insert_id($link));
  exit();

?>

<html>
 <head>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
 </head>

 <body>
  <div id="header"><h1>PHP & MySQL: The Missing Manual</h1></div>
  <div id="example">Example 2-1</div>

  <div id="content">
    <p>Here's a record of what information you submitted:</p>
    <p>
      Name: <?php echo $first_name . " " . $last_name; ?><br />
      E-Mail Address: <?php echo $email; ?><br />
      <a href="<?php echo $facebook_url; ?>">Your Facebook page</a><br />
      <a href="<?php echo $twitter_url; ?>">Check out your Twitter feed</a><br />
    </p>
  </div>

  <div id="footer"></div>
 </body>
</html>
