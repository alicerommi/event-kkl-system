<?php
	// Set the timezone to Jerusalem
	date_default_timezone_set('Asia/Jerusalem');
	$conn = mysqli_connect("localhost","u221375129_kklevents_user","*g4P>7P=pdf","u221375129_kklevents");
	mysqli_set_charset($conn, 'utf8mb4');
	if(!$conn){
		echo "Database is not connected..";
		die;
	}	

?>