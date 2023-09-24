<?php
	session_start();
	include '../../includes/database_connection.php';
	if(isset($_POST['add_event'])){

		 	$event_name =  mysqli_escape_string($conn,$_POST['event_name']);
		 	$unique_id = uniqid();
			$check_record = mysqli_query($conn,"select * from events where event_name='$event_name'");
			if (mysqli_num_rows($check_record)==0){
				
				$query = mysqli_query($conn,"INSERT INTO `events`( `event_name`, `unique_id`) VALUES ('$event_name','$unique_id')");
				if($query)
					$_SESSION['msg_s'] = "Added Successfully";
				else
					$_SESSION['msg_e']= "Error ".mysqli_error($conn);
			}else
				$_SESSION['msg_e']= $event_name." is already exists in DB.";
			header("location:../events.php");
	}#add_event
?>