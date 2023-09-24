<?php
	session_start();
	include '../../includes/database_connection.php';
	if(isset($_POST['clear_db'])){
				$query0 = mysqli_query($conn,"delete from `events`");
				$query1 = mysqli_query($conn,"delete from `booking_track`");
				if($query0 && $query1)
					echo json_encode(array("success"=>1, "msg"=>"Database is clear"));
				else
					echo json_encode(array("success"=>0, "msg"=>"Error in Database Query"));
	}#add_event
?>