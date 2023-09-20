<?php
	#session_start();
	include '../includes/database_connection.php';
	if (isset($_POST['policy_confirm'])) {
		$phone = mysqli_escape_string($conn,$_POST['phone']);
		// $check_phone = mysqli_query($conn,"select * from booking_track where phone='$phone_num'");
		// if (mysqli_num_rows($check_phone) > 0 ){
		// 	echo json_encode(array("success"=>0, "msg"=>"כרטיסים עבור מספר סלולרי זה כבר מומשו"));
		// 	exit;
		// }
		$token = $_POST['token'];
		$site = $_POST['site'];
		$first_name = mysqli_escape_string($conn,$_POST['first_name']);
		$last_name = mysqli_escape_string($conn,$_POST['last_name']);
		$residence = mysqli_escape_string($conn,$_POST['residence']);
		$number_of_people = intval($_POST['number_of_people']);
		$query = mysqli_query($conn,"INSERT INTO `booking_track`(`first_name`, `last_name`, `residence`, `phone`, `number_of_people`, `token`, `site`) VALUES ('$first_name','$last_name','$residence','$phone',$number_of_people,'$token','$site')");
		if($query)
		{
			echo json_encode(array("success"=>1, "msg"=>"Registeration completed"));
		}
		else{
			$error = mysqli_error($conn);
			echo json_encode(array("success"=>0, "msg"=>$error));
		}
	}  //end policy_confirm


	if (isset($_POST['save_leaving_form'])){
		$phone =  mysqli_escape_string($conn, $_POST['phone']);
		$answer =  mysqli_escape_string($conn, $_POST['answer']);
		$check_phone = mysqli_query($conn,"select * from booking_track where phone='$phone' order by record_datetime asc limit 1");
		if (mysqli_num_rows($check_phone) > 0){
			$row = mysqli_fetch_assoc($check_phone);
			//$answer = ;
			$booking_track_id = $row['booking_track_id'];
			if (strlen($row['answer']) == 0){
				
				$query = mysqli_query($conn,"update booking_track set answer= '$answer', answer_timedate=NOW() where booking_track_id=$booking_track_id");
				if ($query){
					$msg = "תשובתך התקבלה בהצלחה  <br/>שמחנו לארח אותך ";
					echo json_encode(array("success"=>1, "msg"=>$msg));
				}else{
					$error = mysqli_error($conn);
					echo json_encode(array("success"=>0, "msg"=>$error));
				}	
			}else{
				$msg = "guest details not match <br/> we already got your answer";
				echo json_encode(array("success"=>0, "msg"=>$msg));
			}
		}else{
			$msg = "guest details not match <br/> we already got your answer";
			echo json_encode(array("success"=>0, "msg"=>$msg));
		}
	}//end save_leaving_form
?>