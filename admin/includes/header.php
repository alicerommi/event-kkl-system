<?php
            include 'actions/session_check.php';
            include '../includes/database_connection.php';
            include './includes/translations/hebrew.php';
            include 'alert_messages.php';
            include 'functions.php';
            $company_name = get_hebrew_text("company_name");

?>  
<!DOCTYPE html>
<html lang="he">
<head>
         <meta charset="UTF-8">

        <title><?php echo get_hebrew_text("company_name"); ?> - Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="<?php echo get_hebrew_text("company_name"); ?> " name="description" />
        <meta content="<?php echo get_hebrew_text("company_name"); ?> " name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
        <link rel="manifest" href="assets/images/site.webmanifest">
        <!-- ION Slider -->
        <link href="assets/plugins/ion-rangeslider/ion.rangeSlider.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/ion-rangeslider/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css">
       
        
          <!--bootstrap-wysihtml5-->
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css">
        <link href="assets/plugins/summernote/dist/summernote.css" rel="stylesheet">
         <!--venobox lightbox-->
        <link rel="stylesheet" href="assets/plugins/magnific-popup/dist/magnific-popup.css">
            <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
          <link href="assets/plugins/colorpicker/colorpicker.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
  
          <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />


        <link href="assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">
        <!-- Plugins css -->
        <link href="assets/plugins/notifications/notification.css" rel="stylesheet">

        <!-- Hebrew -->
        <link href="assets/css/hebrew_style.css" rel="stylesheet" type="text/css">


        <?php
            if (basename($_SERVER['PHP_SELF'])=="qr_code_scanner.php"){
        ?>
                       
                    <style>
                                        code {
                                            background: #f4f5f6;
                                            border-radius: .4rem;
                                            font-size: 86%;
                                            margin: 0 .2rem;
                                            padding: .2rem .5rem;
                                            white-space: nowrap
                                        }
                                        pre {
                                            background: #f4f5f6;
                                            border-left: 0.3rem solid #9b4dca;
                                            overflow-y: hidden
                                        }
                                        pre > code {
                                            border-radius: 0;
                                            display: block;
                                            padding: 1rem 1.5rem;
                                            white-space: pre
                                        }
                                        hr {
                                            border: 0;
                                            border-top: 0.1rem solid #f4f5f6;
                                            margin: 3.0rem 0
                                        }

                                        textarea {
                                            min-height: 6.5rem
                                        }
                                        label,
                                        legend {
                                            display: block;
                                            font-size: 1.6rem;
                                            font-weight: 700;
                                            margin-bottom: .5rem
                                        }
                                        fieldset {
                                            border-width: 0;
                                            padding: 0
                                        }
                                        img {
                                            max-width: 100%
                                        }
                    </style>
                    <?php
                    }
                    ?>




        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <?php
                                          //getting the admin info
                                            $admin_email = $_SESSION['event_adminSession'];
                                            $AdminQuery = mysqli_query($conn,"select* from admin where admin_email='$admin_email'");
                                            $row = mysqli_fetch_array($AdminQuery);
                                            $admin_name = ucwords($row['admin_name']);
                                            $admin_id = $row['admin_id'];
                                            $admin_pic = $row['admin_image'];
                                            if(strlen($admin_pic)==0){
                                                $admin_pic = "assets/images/users/dummy.png";
                                            }else {
                                                $admin_pic = "assets/images/users/".$admin_pic;
                                            }
                                            $admin_email = $row['admin_email'];
    ?>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.php" class="logo"><span><?= $company_name; ?></span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                       

                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="<?php echo $admin_pic; ?>"  class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $admin_name; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="admin_profile.php"><i class="md md-face-unlock"></i>  <?php echo get_hebrew_text("Profile"); ?> <div class="ripple-wrapper"></div></a></li>
                                    <li><a href="includes/logout.php"><i class="md md-settings-power"></i> <?php echo get_hebrew_text("Logout"); ?></a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0"><?php get_hebrew_text("Administrator"); ?></p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            
                            <li>
                                <a href="index.php" class="waves-effect"><i class="md md-home"></i><span><?php echo get_hebrew_text( "Dashboard"); ?> </span></a>
                            </li>



                            <li>
                                <a href="registerations_records.php" class="waves-effect"><i class="md md-now-widgets"></i><span><?php echo "Guest Registeration";  #echo get_hebrew_text("Booked Tickets"); ?> </span></a>
                            </li>

                            <!-- <li>
                                <a href="all_tickets.php" class="waves-effect"><i class="md md-now-widgets"></i><span><?php #echo get_hebrew_text("Booked Tickets"); ?> </span></a>
                            </li>


                            <li>
                                <a href="qr_code_scanner.php" class="waves-effect"><i class="ion-qr-scanner"></i><span><?php #echo get_hebrew_text("QRcode Scanner"); ?> </span></a>
                            </li>

                             <li>
                                <a href="ticket_amount.php" class="waves-effect"><i class="md md-event"></i><span><?php #echo get_hebrew_text("Ticket Amount"); ?> </span></a>
                            </li> -->

                           

                            <li>
                                <a href="includes/logout.php" class="waves-effect"><i class="md md-settings-power"></i><span><?php echo get_hebrew_text("Logout"); ?></span></a>
                            </li>
                          
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>