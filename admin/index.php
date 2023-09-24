<?php
    include 'includes/header.php';
?>

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <?php
                            
                               

                            echo '<div class="col-md-12" style="direction:rtl;">';

                            echo '<div class="alert alert-info text-center" style="font-size:20px;"> <strong>Total Registerations Stats</strong></div>';

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

                        echo '</div>';


                        echo '<div class="col-md-12" style="direction:rtl;">';

                            echo '<div class="alert alert-success text-center" style="font-size:20px;"><strong>Total Events Stats</strong></div>';



                            $events_query = mysqli_query($conn,"select * from events");
                            $num = 0;
                            echo '<table class="table table-bordered text-center" style="    background: white; " id="info_table">

                                    <thead>
                                        <th>#</th>
                                        <th>Event Name</th>
                                        <th>סה”כ נרשמים</th>
                                        <th>סה”כ נרשמים ששלחו תשובה</th>
                                        <th>Page Link</th>
                                    </thead> <tbody>';
                            while($event_row = mysqli_fetch_array($events_query)){
                                $event_id = $event_row['event_id'];
                                $event_name = $event_row['event_name'];
                                $num +=1;
                                $query1_ = mysqli_query($conn,"select count(*) as total_count_without_ans from booking_track where answer is NULL and event_id=$event_id");
                                $query2_ = mysqli_query($conn,"select count(*) as total_count_with_ans from booking_track where answer is not NULL and event_id=$event_id");
                                $query1_row = mysqli_fetch_assoc($query1_);
                                $query2_row = mysqli_fetch_assoc($query2_);
                                $view_events_ = "<a href='registerations_records.php?event_id=".$event_id."' title='View Registerations' class='btn btn-purple'><i class='fa fa-list'></i></a> ";

                                echo '


                                   
                                        <tr>
                                            <td>'.$num.'</td>
                                            <td>'.$event_name.'</td>
                                            <td class="counter">'.$query1_row["total_count_without_ans"].'</td>
                                           <td class="counter">'.$query2_row["total_count_with_ans"].'</td>
                                           <td>'.$view_events_.'</td>
                                        </tr>
                                    ';



                            }//end while loop here
                            echo '</tbody>
                                </table>';




                        echo '</div>';

                           echo '<div class="col-md-12 text-center" style="direction:rtl; margin-top:20px">
                            <div class="form-group">
                                        <button class="btn btn-danger btn-lg" id ="clear_db"><i class="fa fa-trash"></i> Clear DB</button>
                            </div></div>
                           ';

                           



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


        function showConfirmationDialog() {
              Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!',
              }).then((result) => {
                if (result.isConfirmed) {
                  // The user clicked "Yes," perform your operation here
                  // Example: Delete a record, submit a form, etc.
                  performOperation();
                }
              });
        }


        function performOperation() {
          // Put your operation code here
            $.ajax({
                'method':'POST',
                'url':'actions/delete.php',
                'data':{
                    'clear_db':1
                },
                'dataType':'JSON',
                success:function(data){
                    if (data['success']!=1){
                        Swal.fire({
                          icon: 'error',
                          title: '',
                          text: data["msg"],
                           showConfirmButton: false, // Hide the "OK" button\
                           timer: 10000, // 10 seconds in milliseconds
                        });
                    }else{
                                 Swal.fire({
                              icon: 'success',
                              title: '',
                              text: data["msg"],
                               showConfirmButton: false, // Hide the "OK" button
                               timer: 10000, // 10 seconds in milliseconds
                          });
                    }
                }
            });
        }

        $("#clear_db").click(function(){
            showConfirmationDialog();
        });
    });
</script>