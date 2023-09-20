<?php 
session_start();
include '../../includes/database_connection.php';
if(isset($_POST['loginAdmin'])){
		$adminName = $_POST['adminName'];
		$adminPass = $_POST['adminPass'];
		$query = mysqli_query($conn,"select* from admin where admin_email='$adminName' and admin_password='$adminPass'");
		if(mysqli_num_rows($query)==1){
			$row = mysqli_fetch_array($query);	
			$admin_id = $row['admin_id'];
			$_SESSION['event_adminSession'] = $adminName;
			header("location:../index.php");
		}else{
			header("location:../login.php?wrong=1");	
		}
} //end loginAdmin	
?>