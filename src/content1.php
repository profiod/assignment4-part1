<?php 
	session_start(); 
  $properEntry = true; 
  /* adapted from OSU CS 290 lecture PHP Sessions 
   http://eecs.oregonstate.edu/ecampus-video/player/player.php?id=66 */
  if ($_SERVER["REQUEST_METHOD"] !== "POST" && empty($_SESSION)) {
    // use explode to extract the filepath into an array without the filename
    $filePath = explode("/", $_SERVER["PHP_SELF"], -1); 
    // use implode to combine the array back together now that is lacks the filename
    $filePath = implode("/", $filePath); 
    // prepend http and append the file path onto the http host value creating a valid uri
    $redirect = "http://" . $_SERVER["HTTP_HOST"] . $filePath; 
    // set the http header equal to the redirect so that the file redirects
    header("Location: {$redirect}/login.php"); 
    // end further processing of the page
    die(); 
  }
  // else if they are trying to log out 
  else if (empty($_POST["username"]) && !isset($_SESSION["username"])) {
  // use explode to extract the filepath into an array without the filename
  $filePath = explode("/", $_SERVER["PHP_SELF"], -1); 
  // use implode to combine the array back together now that is lacks the filename
  $filePath = implode("/", $filePath); 
  // prepend http and append the file path onto the http host value creating a valid uri
  $link = "http://" . $_SERVER["HTTP_HOST"] . $filePath; 
  echo "<p>A username must be entered. Click <a href= '". $link . "/login.php'>here</a> to return to the login screen.</p>";
  $properEntry = false; 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>content1</title>
</head>
<body>
	<?php 
    if ($properEntry) {
      if (!isset($_SESSION["username"]))
        $_SESSION["username"] = $_POST["username"]; 
      if (!isset($_SESSION["count"]))
        $_SESSION["count"] = 0; 
      else 
        $_SESSION["count"]++; 
        // use explode to extract the filepath into an array without the filename
      $filePath = explode("/", $_SERVER["PHP_SELF"], -1); 
      // use implode to combine the array back together now that is lacks the filename
      $filePath = implode("/", $filePath); 
      // prepend http and append the file path onto the http host value creating a valid uri
      $link = "http://" . $_SERVER["HTTP_HOST"] . $filePath; 
      echo "<p>Hello $_SESSION[username]. You have visited this site $_SESSION[count] times. "; 
      echo "Click <a href= '". $link . "/login.php?action=logout'>here</a> to logout.</p>"; 
      echo "<p>Click <a href= '". $link . "/content2.php'>here</a> to go to content2.</p>"; 
    }
  ?>
</body>
</html>