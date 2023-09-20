<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <?php
                            
                                // $city_query = mysqli_query($conn,"SELECT * FROM `cities`");
                                // while($main_row = mysqli_fetch_assoc($city_query)){
                                //         $city_name = $main_row['city_name']; 
                                //         $city_id = $main_row['city_id'];
                                //         $count_query = mysqli_query($conn,"select sum(other_peoples_count) as other_people_tickets from ticket_booking where city_id = $city_id");
                                //         $count_query2 = mysqli_query($conn,"select * from ticket_booking where city_id=$city_id");
                                //         $row = mysqli_fetch_assoc($count_query);
                                //         $counter = $row['other_people_tickets']+mysqli_num_rows($count_query2); 
                                //         if ($counter>0)
                                               
                                //                 echo '<div class="col-sm-6 col-lg-3">
                                //                                         <div class="mini-stat clearfix bx-shadow bg-white">
                                //                                             <div class="mini-stat-info text-right text-dark">
                                //                                              <span class="counter text-dark">'.$counter.'</span>
                                //                                                     <a href="all_tickets.php?city_id='.$city_id.'">Total Tickets Count for '.$city_name.'</a>
                                //                                             </div>
                                //                                         </div>
                                //                 </div>'; 
                            //}//end while loop here

                            $query = mysqli_query($conn,"select * from booking_track order by record_datetime desc");
                            $counter = mysqli_num_rows($query);
                            echo '<div class="col-sm-6 col-lg-3">
                                                                        <div class="mini-stat clearfix bx-shadow bg-white">
                                                                            <div class="mini-stat-info text-right text-dark">
                                                                             <span class="counter text-dark">'.$counter.'</span>
                                                                                    <a href="registerations_records.php">Total Registerations</a>
                                                                            </div>
                                                                        </div></div>';

                             $query = mysqli_query($conn,"SELECT * FROM `booking_track` where answer is NULL");
                            $counter = mysqli_num_rows($query);
                            echo '<div class="col-sm-6 col-lg-3">
                                                                        <div class="mini-stat clearfix bx-shadow bg-white">
                                                                            <div class="mini-stat-info text-right text-dark">
                                                                             <span class="counter text-dark">'.$counter.'</span>
                                                                                    <a href="registerations_records.php">Total Registerations without Answer Submission</a>
                                                                            </div>
                                                                        </div></div>';


                         $query = mysqli_query($conn,"SELECT * FROM `booking_track` where answer is not NULL");
                            $counter = mysqli_num_rows($query);
                            echo '<div class="col-sm-6 col-lg-3">
                                                                        <div class="mini-stat clearfix bx-shadow bg-white">
                                                                            <div class="mini-stat-info text-right text-dark">
                                                                             <span class="counter text-dark">'.$counter.'</span>
                                                                                    <a href="registerations_records.php">Total Registerations with Answer Submission</a>
                                                                            </div>
                                                                        </div></div>';


                            ?>
                    </div> 
                </div> 
            </div>
</div>
<?php
    include 'includes/footer.php';
?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
                    delay: 100,
                    time: 1200
        });
    });
</script>