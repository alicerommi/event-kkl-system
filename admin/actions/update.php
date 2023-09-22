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


	if(isset($_POST['add_event'])){

		 	$event_name =  mysqli_escape_string($conn,$_POST['event_name']);
		 	$unique_id = $_POST['event_id'];
			$check_record = mysqli_query($conn,"select * from events where event_name='$event_name'");
			if (mysqli_num_rows($check_record)==0){
				
				$query = mysqli_query($conn,"UPDATE `events`  set `event_name`='$event_name' where `unique_id` = '$unique_id'");
				if($query)
					$_SESSION['msg_s'] = "Update Successfully";
				else
					$_SESSION['msg_e']= "Error ".mysqli_error($conn);
			}else
				$_SESSION['msg_e']= $event_name." is already exists in DB.";
		header("location:../events.php");
	}#add_event
?>