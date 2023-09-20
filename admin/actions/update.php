<?php
	session_start();
	include '../../includes/database_connection.php';
	include '../includes/functions.php';
	if(isset($_POST['saveProfiel'])){

		 	$admin_id = $_POST['admin_id'];
			$FullName = $_POST['FullName'];
			$Password = $_POST['Password'];
			$current_pass = $_POST['current_pass'];
			
			$check_admin = mysqli_query($conn,"select * from admin where admin_password='$current_pass' and admin_id=$admin_id");
			$all_ok = 0;
			if (mysqli_num_rows($check_admin)==1){
				$all_ok =1;
			}else{
				header("location:../admin_profile.php?passmismatch=1");
				exit;
			}

			$image_upload = 0;
			$image_name = "dummy.png";
			if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
		        $temp_name = $_FILES["image"]["tmp_name"];
		        $name = $_FILES["image"]["name"];
		        // Specify the directory where you want to save the uploaded image
		        $upload_dir = "../assets/images/users/";
		        // Move the temporary file to the uploads directory
		        if (move_uploaded_file($temp_name, $upload_dir . $name)) {
		            $image_upload = 1;
		            $image_name = $name;
		        }
		  }

		  if ($all_ok){
			 	$sql = "UPDATE `admin` SET `admin_name`='$FullName',`admin_password`='$Password',`admin_image`='$image_name' WHERE admin_id=$admin_id";
				$query = mysqli_query($conn,$sql);
			    if($query)
				header("location:../admin_profile.php?updated=1");
			else
				header("location:../admin_profile.php?updated=0");
		  }
	}#saveProfile


	if (isset($_POST['update_qr_data'])){

		 	$ticket_id = $_POST['ticket_id'];
			$name = $_POST['name'];
			$city_id = $_POST['city_id'];
			$check_entry = mysqli_query($conn,"select * from `booking_track` where `person_name`='$name' and `ticket_id`='$ticket_id' and `city_id`=$city_id");
			if (mysqli_num_rows($check_entry)==1){
				$row = mysqli_fetch_assoc($check_entry);
				if ($row['arrived_status']==1){
					$arrived_datetime = $row['arrived_datetime'];
					mysqli_query($conn, "update booking_track set arrived_datetime=NOW() where `person_name`='$name' and ticket_id=$ticket_id");
					echo json_encode(array("success"=>1,"msg"=>"Record Found, This QR Code used earlier, Last Used: $arrived_datetime"));
				}else{
					mysqli_query($conn, "update booking_track set `arrived_status`=1, arrived_datetime=NOW() where `person_name`='$name' and ticket_id=$ticket_id");
					echo json_encode(array("success"=>1,"msg"=>"Record Found, QR Code is Valid"));
				}
			}else{
				echo json_encode(array("success"=>0,"msg"=>"Record Not Found againt the given QR Code"));
			}
			#booking_datetime
	} // end update_qr_data here


	if (isset($_POST['update_ticker_amount'])){

			$ticket_amount = $_POST['ticket_amount'];
			$query = mysqli_query($conn,"select count(*) as total_tickets_for_city, booking_track.city_id,cities.city_name from booking_track inner join cities on cities.city_id = booking_track.city_id GROUP BY booking_track.city_id order by total_tickets_for_city desc limit 1");			
			$row = mysqli_fetch_assoc($query);
			$total_tickets_for_city = $row['total_tickets_for_city'];
			$city_name = $row['city_name'];
			if ($total_tickets_for_city > $ticket_amount ){
				$_SESSION['msg'] = "$city_name has $total_tickets_for_city tickets booked, so you cant reduce the amount of tickets";
				header("Location:../ticket_amount.php?msg=1");
			}else{
				$query0 = mysqli_query($conn,"UPDATE cities SET limit_of_tickets = $ticket_amount, last_edit_datetime=NOW()");
				$query = mysqli_query($conn,"UPDATE `ticket_limit` SET `ticket_limit_number`=$ticket_amount WHERE `ticket_limit_id`=2");			
				if ($query){
					header("Location:../ticket_amount.php?success=1");
					exit;
				}else{
					header("Location:../ticket_amount.php?success=0");
					exit;
				}
			}	
 
	}//end update_ticker_amount



	if (isset($_POST['update_ticker_amount_for_each_city'])){

			$city_id = $_POST['city_id'];
			
			$ticket_limit = $_POST['ticket_amount__'];
			$query = mysqli_query($conn,"select * from cities where city_id=$city_id");
			$row = mysqli_fetch_assoc($query);
			$limit_of_tickets = $row['limit_of_tickets'];
			$city_name = $row['city_name'];

			$count_query = mysqli_query($conn,"SELECT count(*) as total_booked_tickets FROM `booking_track` where city_id=$city_id");
			$row2 = mysqli_fetch_assoc($count_query);
			
			$total_tickets_for_city = $row2['total_booked_tickets']; 
			
			if ($ticket_limit > $total_tickets_for_city  ){
				
				$k = "UPDATE cities SET limit_of_tickets = $ticket_limit, last_edit_datetime = NOW() where city_id=$city_id";
				
				$query0 = mysqli_query($conn,$k);
				if ($query0){
					$_SESSION['msg_2'] = "Limit of ticket has been changed from $limit_of_tickets to $ticket_limit for $city_name successfully";
					header("Location:../ticket_amount.php");
					exit;
				}else{
					$_SESSION['error_2'] = mysqli_error($conn);
					header("Location:../ticket_amount.php");
					exit;
				}
			}else{
				$_SESSION['error_2'] = "$city_name has $total_tickets_for_city tickets booked, so you can't reduce the limit of tickets up to $ticket_limit";
				header("Location:../ticket_amount.php");
			}
	}//end update_ticker_amount_for_each_city
?>