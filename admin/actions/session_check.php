<?php
			session_start();
			if(!isset($_SESSION['event_adminSession'])){
				header("location:login.php");
			}
?>