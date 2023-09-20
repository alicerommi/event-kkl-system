<?php
    include 'includes/header.php';
?>
<style>
.dt-buttons{  
    margin-bottom: 20px !important;
}
</style>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css"></script>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">

                                <div class="col-md-12">
                                    <div class="panel panel-default" style="direction: rtl;">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><?php echo "All Registerations" #get_hebrew_text("All Tickets Booked By Users")?></h3>
                                        </div>
                                        <div class="panel-body ">
                                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th><?php  echo "Full Name"; #echo get_hebrew_text("City"); ?> </th>
                                                                    <th><?php  echo "Residence"; #echo get_hebrew_text("Email"); ?> </th>
                                                                    <th><?php  echo "Phone"; #echo get_hebrew_text("Phone"); ?> </th>
                                                                    <th><?php  echo "People Count"; #echo get_hebrew_text("Extra Tickets Count"); ?> </th>
                                                                    <th><?php  echo "Reg. DateTime"; #echo get_hebrew_text("Booking Datetime"); ?> </th>
                                                                    <th><?php  echo "Answer Status"; #echo get_hebrew_text("Action"); ?> </th>

                                                                    <th><?php  echo "Answer"; #echo get_hebrew_text("Action"); ?> </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    <?php
                                                                       
                                                                        $query = mysqli_query($conn,"select * from booking_track order by record_datetime desc");
                                                                        while($row = mysqli_fetch_array($query)){

                                                                                $booking_track_id = $row['booking_track_id'];
                                                                                $first_name = $row['first_name'];
                                                                                $last_name = $row['last_name'];
                                                                                $residence = $row['residence'];
                                                                                $phone = $row['phone'];
                                                                                $number_of_people = $row['number_of_people'];
                                                                                $token = $row['token'];
                                                                                $site = $row['site'];
                                                                                $record_datetime = $row['record_datetime'];
                                                                                $answer = $row['answer'];
                                                                                $answer_timedate = $row['answer_timedate'];
                                                                                //$actions = "-";
                                                                                $ans_status ='Answer Not Submitted' ;
                                                                                if (strlen($answer) > 0)
                                                                                    {//$actions = '<button id="'.$booking_track_id.'" title="See Answer Details" class="btn btn-info view_ans_details"><i class="fa fa-eye"></i></a>';
                                                                                    $ans_status ='Answer Submitted ('.$answer_timedate.')';
                                                                                }
                                                                            echo '<tr>
                                                                            <td>'.$booking_track_id.'</td>
                                                                            <td>'.$last_name.' '.$last_name.'</td>
                                                                            <td>'.$residence.'</td>
                                                                                 <td>'.$phone.'</td>
                                                                                   <td>'.$number_of_people.'</td>
                                                                                     <td>'.$record_datetime.'</td>
                                                                                     <td>'.$ans_status.'</td>
                                                                                       <td>'.$answer.'</td>
                                                                            </tr>';
                                                                       }
                                                                    ?>
                                                            </tbody>
                                                        </table>
                                            </div>
                                        </div>

                                        
                                </div>
                                </div>
                    </div> 
                </div> 
            </div>
</div>
<?php
    include 'includes/footer.php';
?>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#datatable-responsive').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'print'],
    });
    jQuery(".select2").select2({
            width: '100%'
    });
    // $("#list_of_cities").change(function(){
    //         let cid = $(this).find(":selected").val();
    //         location.href="all_tickets.php?city_id="+cid;
    // });
});
</script>