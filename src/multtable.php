<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>multtable</title>
  <link rel="stylesheet" href="mult_table.css">
</head>
<body>
  <?php
  $exitEarly = false; 
    if (!isset($_GET["min-multiplicand"])){
      echo "<p>Error: min-multiplicand not passed.</p>";
      $exitEarly = true;
    }
    else {
      if(!ctype_digit($_GET["min-multiplicand"])){
        echo "<p>Error: min-multiplicand is not an integer.</p>"; 
        $exitEarly = true; 
      }
      else {
        $min_multiplicand = (int) $_GET["min-multiplicand"];
      }
    }
    if (!isset($_GET["max-multiplicand"])){
      echo "<p>Error: max-multiplicand not passed.</p>";
      $exitEarly = true; 
    }
    else {
      if(!ctype_digit($_GET["max-multiplicand"])){
        echo "<p>Error: max-multiplicand is not an integer.</p>"; 
        $exitEarly = true; 
      }
      else {
        $max_multiplicand = (int) $_GET["max-multiplicand"];
      }
    }
    if (!isset($_GET["min-multiplier"])){
      echo "<p>Error: min-multiplier not passed.</p><br>";
      $exitEarly = true; 
    }
    else {
      if(!ctype_digit($_GET["min-multiplier"])){
        echo "<p>Error: min-multiplier is not an integer.</p>"; 
        $exitEarly = true; 
      }
      else {
        $min_multiplier = (int) $_GET["min-multiplier"];
      }
    }
    if (!isset($_GET["max-multiplier"])){
      echo "<p>Error: max-multiplier not passed.</p>";
      $exitEarly = true; 
    }
    else {
      if(!ctype_digit($_GET["max-multiplier"])){
        echo "<p>Error: max-multiplier is not an integer.</p>"; 
        $exitEarly = true; 
      }
      else {
        $max_multiplier = (int) $_GET["max-multiplier"];
      }
    }
    if(!$exitEarly){
      if ($max_multiplier < $min_multiplier){
        echo "<p>Error: max-multiplier is greater than min-multiplier.</p>"; 
        $exitEarly = true; 
      }
      if ($max_multiplicand < $min_multiplicand){
        echo "<p>Error: max-multiplicand is greater than min-multiplicand.</p>"; 
      }
    }
    if (!$exitEarly){
      echo "<table><tr><th></th>";
      for($i = $min_multiplier; $i <= $max_multiplier; $i++) {
        echo "<th>$i</th>";
      }
      echo "</tr>"; 
      for($i = $min_multiplicand; $i <= $max_multiplicand; $i++) {
        echo"<tr><th>$i</th>";
        for ($j = $min_multiplier; $j <= $max_multiplier; $j++) {
          $data = $i * $j; 
          echo "<td>$data</td>";
        }
        echo "</tr>"; 
      }
      echo "</table>";
    }
  ?>
</body>
</html>