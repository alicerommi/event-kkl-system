<?php
	//for showing the alert messages 
	function messages($msg,$type){
		if($type=="success"){
			
			
			echo '<div class="alert alert-'.$type.' alert-dismissible fade in actions_messages text-center">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            '.ucwords($msg).'
                                        </div>';
		}else if($type=="warning"){
			
				echo '<div class="alert alert-'.$type.' alert-dismissible fade in actions_messages text-center">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            '.ucwords($msg).'
                                        </div>';
		}else if($type=="danger"){
			
				echo '<div class="alert alert-'.$type.' alert-dismissible fade in actions_messages text-center">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            '.ucwords($msg).'
                                        </div>';
		}else if($type=="info"){
			
				echo '<div class="alert alert-'.$type.' alert-dismissible fade in actions_messages text-center">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            '.ucwords($msg).'
                                        </div>';
		}
	}	
	//for showing the information related to page in admin panel
	function info_message($msg){
		echo '<div class="alert alert-info alert-dismissible fade in " style="font-weight:600;">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Info! 
                                           	'.ucwords($msg).'
        </div>';
	}
	function danger_message($msg){
		echo '<div class="alert alert-danger alert-dismissible fade in text-center" style="font-weight:600;">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Info! 
                                           	'.ucwords($msg).'
        </div>';
	}

	//for showing the back button on each page
	function show_back_button($page_link,$btn_title){
			echo '<div class="pull-right"><a href="'.$page_link.'" title="'.$btn_title.'" class="btn btn-danger waves-effect waves-light m-b-5"><i class="md md-keyboard-arrow-left"></i> '.$btn_title.'</a></div>';
	}

	function show_button($page_link,$btn_title,$btn_type,$icon){
			echo '<div class="pull-right" style="margin-bottom: 20px;"><a href="'.$page_link.'" title="'.$btn_title.'" class="btn btn-'.$btn_type.'" waves-effect waves-light m-b-5"><i class="fa fa-'.$icon.'"></i> '.$btn_title.'</a></div>';
	}


?>