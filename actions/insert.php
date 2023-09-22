<?php
	include '../includes/database_connection.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require '../includes/vendor/autoload.php';

	function sendEmail($to, $subject, $message) {
	    $mail = new PHPMailer(true);

	    try {
	        //Server settings
	        $mail->isSMTP();
	        $mail->Host       = 'smtp.gmail.com'; // SMTP server
	        $mail->SMTPAuth   = true;
	        $mail->Username   = 'Zaparaton.kkl@gmail.com'; // SMTP username
	        $mail->Password   = 'Zaparaton2023'; // SMTP password
	        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
	        $mail->Port       = 587; // TCP port to connect to

	        //Recipients
	        $mail->setFrom($mail->Username, 'Kkl'); // Sender's email and name
	        $mail->addAddress($to); // Recipient's email

	        // Content
	        $mail->isHTML(true);
	        $mail->Subject = $subject;
	        $mail->Body    = $message;
	        $mail->send();
	        return true;
	    } catch (Exception $e) {
	        return false;
	    }
	} // end sendEmail Function here


	if (isset($_POST['policy_confirm'])) {

		$phone = mysqli_escape_string($conn,$_POST['phone']);
		$token = $_POST['token'];

		$check_token  = mysqli_query($conn,"select * from booking_track where token ='$token'");
		if(mysqli_num_rows($check_token) > 0) {
			$error = "על פי נתוני המערכת מספר סלולרי זה כבררשום";
			echo json_encode(array("success"=>0, "msg"=>$error));
		}else{
			$unique_id = $_POST['site'];
			$first_name = mysqli_escape_string($conn,$_POST['first_name']);
			$last_name = mysqli_escape_string($conn,$_POST['last_name']);
			$residence = mysqli_escape_string($conn,$_POST['residence']);
			$mail = mysqli_escape_string($conn,$_POST['mail']);
			$event_query = mysqli_query($conn,"select * from events where unique_id = '$unique_id'");
			$row = mysqli_fetch_assoc($event_query);
			$event_id = $row['event_id'];
			$number_of_people = intval($_POST['number_of_people']);

			
			$k = "INSERT INTO `booking_track`(`event_id`,`first_name`, `last_name`, `residence`, `phone`,`email_address`, `number_of_people`, `token`, `site`) VALUES ($event_id,'$first_name','$last_name','$residence','$phone','$mail',$number_of_people,'$token','$unique_id')";
			$subject = "אישור רישום לאירוע צפרתון 2023";
			$message  = "<p style='direction:rtl'>הרישום לאירוע הצפרתון הושלם בהצלחה, הנך מוזמן לבקר באירוע <br/> המשך יום מהנה! <br/> בברכה קק”ל</p>";

			if (sendEmail($mail, $subject, $message )){
					$query = mysqli_query($conn, $k);
					if($query)
						echo json_encode(array("success"=>1, "msg"=>"הרישום הושלם בהצלחה"));
					else{
						$error = mysqli_error($conn);
						echo json_encode(array("success"=>0, "msg"=>$error));
					}
			}else{
					echo json_encode(array("success"=>0, "msg"=>"Error in sending email to $mail"));
			}

			
		}
		
	}  //end policy_confirm


	if ( isset($_POST['save_leaving_form']) ) {

		$phone =  mysqli_escape_string($conn, $_POST['phone']);
		$answer =  mysqli_escape_string($conn, $_POST['answer']);
		$check_phone = mysqli_query($conn,"select * from booking_track where phone='$phone' order by record_datetime asc limit 1");
		if (mysqli_num_rows($check_phone) == 1){
			$row = mysqli_fetch_assoc($check_phone);
			$booking_track_id = $row['booking_track_id'];
			if (strlen($row['answer']) == 0){
				$query = mysqli_query($conn,"update booking_track set answer= '$answer', answer_timedate=NOW() where booking_track_id=$booking_track_id");
				if ($query){
					$msg = "תשובך התקבלה, בהצלחה<br/>שמחנו לארח אותך";
					echo json_encode(array("success"=>1, "msg"=>$msg));
				}else{
					$error = mysqli_error($conn);
					echo json_encode(array("success"=>0, "msg"=>$error));
				}	
			}else{
				$msg = "תשובה עבור מספר סלולרי זה כבר התקבלה";
				echo json_encode(array("success"=>0, "msg"=>$msg));
			}
		}else{
			$msg = "פרטי האורח אינם מזוהים במערכת";
			echo json_encode(array("success"=>0, "msg"=>$msg));
		}
	
	}//end save_leaving_form
?>