<?php
			session_start();
			if(isset($_SESSION['event_adminSession'])){
				unset($_SESSION['event_adminSession']);
				header("location:../login.php");
			}
?>