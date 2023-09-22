<?php
	// Set the timezone to Jerusalem
	date_default_timezone_set('Asia/Jerusalem');
	$conn = mysqli_connect("localhost","root","","kkl-event-2-db");
	mysqli_set_charset($conn, 'utf8mb4');
	if(!$conn){
		echo "Database is not connected..";
		die;
	}

?>