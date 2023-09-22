<?php
	# for admin panel
	$trans = array (
		"Login Page Title"=>"Login To Event Management",
		"company_name"=>"Event Management",
		# header.php Admin panel
		"Dashboard"=>"Dashboard",
		"Booked Tickets"=> "Booked Tickets",
		"Logout"=>"Logout",
		"Profile"=>"Profile",
		"Administrator"=>"Administrator",
		"Administrator Picture"=>"Administrator Picture",
		"QRcode Scanner"=>"QRcode Scanner",
		"Ticket Amount"=>"Ticket Amount",
		# admin_profile.php
		"Edit Your Profile"=>"Edit Your Profile",
		"Admin profile has been updated successfully."=>"Admin profile has been updated successfully.",
		"Error in updating admin profile." => "Error in updating admin profile",
		"Error in uploading the image." => "Error in uploading the image",
		"The image format is not valid (use these formats: png,jpg,jpeg)" => "The image format is not valid (use these formats: png,jpg,jpeg)",
		"Both Passwords are Mismatched" => "Both Passwords are Mismatched",
		"Full Name"=>"Full Name",
		"Email"=>"Email",
		"New Password"=>"New Password",
		"Current Password"=>"Current Password",
		"Update Info."=>"Update Info.",
		"Details updated"=>"Details updated",
		"Error in updating details"=>"Error in updating details",
		"The current password is mismatched"=>"The current password is mismatched",

		#all_tickets.php page
		"All Tickets Booked By Users"=>"All Tickets Booked By Users",
		"City"=>"City",
		"Booking Person name"=>"Booking Person name",
		"Email"=>"Email",
		"Phone"=>"Phone",
		"Extra Tickets Count"=>"Extra Tickets Count",
		"Booking Datetime"=>"Booking Datetime",
		"Action"=>"Action",

		#view_ticket_info.php
		"Back to Tickets Page"=>"Back to Tickets Page",
		"View Ticket"=>"View Ticket",
		"Details"=>"Details",
		"City Name"=>"City Name",
		"First Name"=>"First Name",
		"Last Name"=>"Last Name",
		"Tip: Below Details are about the person who did booking."=>"Tip: Below Details are about the person who did booking.",
		"Phone#"=>"Phone#",
		"Email Address"=>"Email Address",
		"Extra Tickets Count"=>"Extra Tickets Count",
		"QRcode for "=>"QRcode for ",

		#qr_code_scanner.php
		"Scan QR Code with Mobile Rear Camera"=>"Scan QR Code with Mobile Rear Camera",		

		#index.php

		"Info! Welcome To"=>"Info! Welcome To",
		"Total Tickets Count"=>"Total Tickets Count",

		#login.php

		"Sign In to"=>"Sign In to",
		"Log In"=>"Log In",
		"Admin Panel"=>"Admin Panel",
		"You have entered wrong details"=>"You have entered wrong details",

		#qr_code_scanner.php
		"History of Scanned QR Codes"=>"History of Scanned QR Codes",
		"Name"=>"Name",
		"City"=>"City",
		"Arrival Datetime"=>"Arrival Datetime",


		#ticket_amount.php
		"Change the ticket limit default"=>"Change the ticket limit default",
		"Enter the amount of tickets (For All Cities)"=>"Enter the amount of tickets (For All Cities)",
		"Save"=>"Save",

		"Change the ticket limit for any city"=>"Change the ticket limit for any city",
		"Enter the amount of tickets (For Above selected city)"=>"Enter the amount of tickets (For Above selected city)",
		"Choose City"=>"Choose City",



		#events.php

		"Add A New Event"=>"Add A New Event",
		"Event Name"=>"Event Name",
		"Save"=>'Save',
		"Events"=>"Events",
		"QR Code Link"=>"מחולל QR",
		"Actions"=>"Actions",
		




		#register_records.php
		

		"full name"=> "שם מלא",
		"event name"=> "אירוע,",
		"residence"=> "מקום מגורים",
		"phone"=> "סלולרי",
		"mail" => "מייל",
		"people count"=> "משתתפים",
		"reg date time"=> "תאריך רישום",
		"answer status" =>"סטטוס תשובה", 
		"Answer Not Submitted" =>"לא נתקבלה",   
		"Answer Submitted"=>  "נתקבלה ב",
		"answer" => "תשובה",


	);

	function get_hebrew_text($text){
		return $GLOBALS['trans'][$text];
	}
	// echo get_hebrew_text("Total Tickets Count");
// $keys = array_keys($trans);

// for ($i=0;$i<sizeof($keys);$i++){
// 	echo $keys[$i]."<br/>";
// }die;

?>