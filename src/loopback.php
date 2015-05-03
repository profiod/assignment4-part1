<?php
   if($_SERVER["REQUEST_METHOD"] === "GET"){
    if (!empty($_GET)){
      foreach($_GET as $key => &$value) {
        if(empty($value) && $value !== "0") {
          $value = "undefined"; 
        }
      }
      $jsonStrng = array("Type" => "GET", "parameters" => $_GET);
      $jsonStrng = json_encode($jsonStrng); 
      echo "$jsonStrng"; 
    }
    else {
      $jsonStrng = array("Type" => "GET", "parameters" => "null");
      $jsonStrng = json_encode($jsonStrng); 
      echo "$jsonStrng"; 
    }
   }
   else if($_SERVER["REQUEST_METHOD"] === "POST"){
    if (!empty($_POST)){
      foreach($_POST as $key => &$value) {
        if(empty($value) && $value !== "0") {
          $value = "undefined"; 
        }
      }
      $jsonStrng = array("Type" => "POST", "parameters" => $_POST);
      $jsonStrng = json_encode($jsonStrng); 
      echo "$jsonStrng"; 
    }
    else {
      $jsonStrng = array("Type" => "POST", "parameters" => "null");
      $jsonStrng = json_encode($jsonStrng); 
      echo "$jsonStrng"; 
    }
  }
?>