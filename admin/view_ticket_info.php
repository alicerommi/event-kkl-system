<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <?php


                                // $have_city = False;

                                if (isset($_GET['city_id']))
                                    show_button("all_tickets.php?city_id=".$_GET['city_id'],"Back to Tickets Page","inverse","eye");
                                else
                                    show_button("all_tickets.php","Back to Tickets Page","inverse","eye");

                                $ticket_id = $_GET['ticket_id'];
                                $query = mysqli_query($conn,"select* from ticket_booking inner join cities where cities.city_id = ticket_booking.city_id and ticket_booking.ticket_id=$ticket_id");
                                $row = mysqli_fetch_assoc($query);
                                $city_name = $row['city_name'];
                                $first_name = $row['first_name'];
                                $last_name = $row['last_name'];
                                $email_address = $row['email_address'];
                                $phone = $row['phone'];
                                $other_peoples_count = $row['other_peoples_count'];
                                $other_people_arr = unserialize( $row['other_people_arr']);
                                $qr_codes_arr = unserialize($row['qr_codes_arr']);
                                $booking_datetime = $row['booking_datetime'];
                                $token = $row['token'];

                            ?>

                                <div class="col-md-12">
                                    <div class="panel panel-default panel-fill" style="direction: rtl;">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><?php echo get_hebrew_text("View Ticket"); ?>#<?=$ticket_id?> <?php echo get_hebrew_text("Details"); ?> </h3>
                                        </div>
                                        <div class="panel-body">
                                          
                                                   <div class="col-md-6">
                                                                <div class="about-info-p">
                                                                    <strong><?= get_hebrew_text("City Name")?></strong><br>
                                                                    <p class="text-muted"><?= $city_name ?></p>
                                                                    
                                                                </div>

                                                                 <span class="help-block"><small>Tip: Below Details are about the person who did booking.</small></span>
                                                                <div class="about-info-p">
                                                                     <strong><?= get_hebrew_text("First Name")?></strong><br>
                                                                    <p class="text-muted"><?= $first_name ?></p>
                                                                </div>

                                                                <div class="about-info-p">
                                                                   <strong><?= get_hebrew_text("Last Name") ?></strong><br>
                                                                    <p class="text-muted"><?= $last_name ?></p>
                                                                </div>

                                                                 <div class="about-info-p">
                                                                <strong><?= get_hebrew_text("Booking Datetime") ?></strong><br/>
                                                                <p class="text-muted"><?= human_timedate($booking_datetime) ?></p>
                                                            </div>

                                                                

                                                    </div>

                                                    <div class="col-md-6">

                                                            <div class="about-info-p">
                                                                   <strong><?= get_hebrew_text("Phone#") ?></strong><br>
                                                                    <p class="text-muted"><?= $phone ?></p>
                                                                </div>

                                                                 <div class="about-info-p">
                                                                   <strong><?= get_hebrew_text("Email Address") ?></strong><br>
                                                                    <p class="text-muted"><?= $email_address ?></p>
                                                                </div>
                                                            <div class="about-info-p">
                                                                <strong><?= get_hebrew_text("Extra Tickets Count") ?></strong><br/>
                                                                <p class="text-muted"><?= $other_peoples_count ?></p>
                                                            </div>


                                                            <div class="about-info-p">
                                                                <strong>Download Ticket Link</strong><br/>
                                                                <a href="../get_ticket.php?download_ticket=<?=$token?>" target="_blank" class="btn btn-info">See Tickets</a>
                                                            </div>
                                                             
                                                    </div>
                                        </div>
                                    </div>  
                                </div>
                                </div>

                        <div class="row">

                            
                                    <?php 
                                    $path = "../images/";
                                    for ($i=0; $i< sizeof($qr_codes_arr);$i++){
                                            if ($i==0)
                                                $name=$first_name." ".$last_name;
                                            else
                                                $name = $other_people_arr[$i-1];
                                            $img = $path. $qr_codes_arr[$i];
                                            echo $div = '<div class="col-md-4" style="direction:rtl;">
                                               
                                                <div class="panel panel-default panel-fill">
                                                    <div class="panel-heading"> 
                                                        <h3 class="panel-title">'.get_hebrew_text("QRcode for ").$name.'</h3> 
                                                    </div> 
                                                    <div class="panel-body"> 
                                                        <img src="'.$img.'" class="thumb-img" alt="'.$name.'">
                                                        
                                                    </div> 
                                                </div>

                                            </div>';
                                    }//end for loop here
                                    ?>
                                </div>
                        </div>
                    </div> 
                </div> 
            </div>
<?php
    include 'includes/footer.php';
?>