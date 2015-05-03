<?php 
	session_start(); 
  /* adapted from OSU CS 290 lecture PHP Sessions 
   http://eecs.oregonstate.edu/ecampus-video/player/player.php?id=66 */
  if (empty($_SESSION)) {
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>content2</title>
</head>
<body>
	<?php 
  // use explode to extract the filepath into an array without the filename
  $filePath = explode("/", $_SERVER["PHP_SELF"], -1); 
  // use implode to combine the array back together now that is lacks the filename
  $filePath = implode("/", $filePath); 
  // prepend http and append the file path onto the http host value creating a valid uri
  $link = "http://" . $_SERVER["HTTP_HOST"] . $filePath;  
  echo "<p>Click <a href= '". $link . "/content1.php'>here</a> to return to content1.</p>"; 
  ?>
</body>
</html>