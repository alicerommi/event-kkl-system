<?php
	include '../../includes/database_connection.php';
	

	if(isset($_POST['get_ticket_info'])){
		$city_id = $_POST['city_id'];
		$query = mysqli_query($conn,"select limit_of_tickets from cities where city_id=$city_id");
		$row= mysqli_fetch_assoc($query);
		echo json_encode($row);
	}	
?>