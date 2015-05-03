<?php 
  session_start(); 
  /* adapted from OSU CS 290 lecture PHP Sessions 
   http://eecs.oregonstate.edu/ecampus-video/player/player.php?id=66 */
  // if a user is already logged and not trying to log out redirect to content1
  if (!empty($_SESSION["username"]) && !(isset($_GET["action"]) && $_GET["action"] == "logout")) {
    // use explode to extract the filepath into an array without the filename
    $filePath = explode("/", $_SERVER["PHP_SELF"], -1); 
    // use implode to combine the array back together now that is lacks the filename
    $filePath = implode("/", $filePath); 
    // prepend http and append the file path onto the http host value creating a valid uri
    $redirect = "http://" . $_SERVER["HTTP_HOST"] . $filePath; 
    // set the http header equal to the redirect so that the file redirects
    header("Location: {$redirect}/content1.php"); 
    // end further processing of the page
    die(); 
  }
  // else if they are trying to log out 
  else if (isset($_GET["action"]) && $_GET["action"] == "logout"){
    // erase the session array and destroy the session 
    $_SESSION = array(); 
    session_destroy(); 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
  <?php
  // use explode to extract the filepath into an array without the filename
  $filePath = explode("/", $_SERVER["PHP_SELF"], -1); 
  // use implode to combine the array back together now that is lacks the filename
  $filePath = implode("/", $filePath); 
  // prepend http and append the file path onto the http host value creating a valid uri
  $link = "http://" . $_SERVER["HTTP_HOST"] . $filePath; 
  echo "<form action='". $link . "/content1.php' method='post'>"
  ?>
    <p>
      <span>Username: </span>
      <input type="text" name="username">
      <input type="submit">
    </p>
</body>
</html>