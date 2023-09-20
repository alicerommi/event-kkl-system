<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function human_timedate($date){
    if ($date!=null)
      return date("d-m-Y h:i:sa",strtotime($date));
    else
      return "N/A";
} 

function getRandomToken($n) {
    $characters = '0123456789'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    }
    return sha1($randomString); 
} 
?>