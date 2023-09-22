<?php
include '../includes/database_connection.php';
if (isset($_POST['check_phone'])){
		$phone =  mysqli_escape_string($conn, $_POST['phone']);
		$check_phone = mysqli_query($conn,"select * from booking_track where phone='$phone' order by record_datetime asc limit 1");
		if (mysqli_num_rows($check_phone) == 1){
			$row = mysqli_fetch_assoc($check_phone);
			if (strlen($row['answer']) == 0){
				$name  = $row['first_name'].' '.$row['last_name'];
				
				$msg = "שלום  ".$name." הקלד את תשובתך ";
				echo json_encode(array("success"=>1, "msg"=>$msg));
			}else{
				$msg = "תשובה עבור מספר סלולרי זה כבר התקבלה";
				echo json_encode(array("success"=>0, "msg"=>$msg));
			}
		}else{
			$msg = "פרטי האורח אינם מזוהים במערכת";
			echo json_encode(array("success"=>0, "msg"=>$msg));
		}
}//end check_phone
?>