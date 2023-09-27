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



                                                <div class="text-left">
        <a class="toggle-vis" data-column="1"><?php echo get_hebrew_text("full name");?> </a> - <a class="toggle-vis" data-column="2"><?php echo get_hebrew_text("event name");?></a> - <a class="toggle-vis" data-column="3"><?php echo get_hebrew_text("residence");?></a> - <a class="toggle-vis" data-column="4"><?php echo get_hebrew_text("phone");?> </a> - <a class="toggle-vis" data-column="5"><?php echo get_hebrew_text("mail");?> </a> - <a class="toggle-vis" data-column="6"><?php echo get_hebrew_text("people count");?></a> - <a class="toggle-vis" data-column="7"><?php echo get_hebrew_text("reg date time");?></a> - <a class="toggle-vis" data-column="8"><?php echo get_hebrew_text("answer status");?></a> - <a class="toggle-vis" data-column="9"><?php echo get_hebrew_text("answer");?></a>
    </div>

                                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th><?php  echo get_hebrew_text("full name"); ?> </th>
                                                                    <th><?php  echo get_hebrew_text("event name"); ?> </th>
                                                                    <th><?php  echo get_hebrew_text("residence"); ?> </th>
                                                                    <th><?php  echo get_hebrew_text("phone"); ?> </th>
                                                                    <th><?php  echo get_hebrew_text("mail"); ?> </th>
                                                                    <th><?php  echo get_hebrew_text("people count"); ?> </th>
                                                                    <th><?php  echo get_hebrew_text("reg date time"); ?> </th>
                                                                    <th><?php  echo get_hebrew_text("answer status"); ?> </th>
                                                                    <th><?php  echo get_hebrew_text("answer"); ?> </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    <?php
                                                                        $query= mysqli_query($conn,"select * from booking_track  inner join events on events.event_id = booking_track.event_id order by record_datetime desc");
                                                                        if(isset($_GET['event_id'])){
                                                                            $event_id = intval($_GET['event_id']);
                                                                            $query= mysqli_query($conn,"select * from booking_track inner join events on events.event_id = booking_track.event_id and events.event_id  = $event_id order by record_datetime desc");
                                                                        }
                                                                       
                                                                        //$query = mysqli_query($conn,"select * from booking_track  inner join events on events.event_id = booking_track.event_id order by record_datetime desc");
                                                                        while($row = mysqli_fetch_array($query)){

                                                                                $booking_track_id = $row['booking_track_id'];
                                                                                $first_name = $row['first_name'];
                                                                                $last_name = $row['last_name'];
                                                                                $residence = $row['residence'];
                                                                                $phone = $row['phone'];
                                                                                $event_name = $row['event_name'];
                                                                                $email_address = $row['email_address'];
                                                                                $number_of_people = $row['number_of_people'];
                                                                                $token = $row['token'];
                                                                                $site = $row['site'];
                                                                                $record_datetime = $row['record_datetime'];
                                                                                $answer = $row['answer'];
                                                                                $answer_timedate = $row['answer_timedate'];
                                                                                //$actions = "-";
                                                                                $ans_status = get_hebrew_text('Answer Not Submitted') ;
                                                                                if (strlen($answer) > 0)
                                                                                    {//$actions = '<button id="'.$booking_track_id.'" title="See Answer Details" class="btn btn-info view_ans_details"><i class="fa fa-eye"></i></a>';
                                                                                    $ans_status = get_hebrew_text("Answer Submitted").' ('.$answer_timedate.')';
                                                                                }
                                                                            echo '<tr>
                                                                            <td>'.$booking_track_id.'</td>
                                                                            <td>'.$first_name.' '.$last_name.'</td>
                                                                            <td>'.$event_name.'</td>
                                                                            <td>'.$residence.'</td>
                                                                                 <td>'.$phone.'</td>
                                                                                   <td>'.$email_address.'</td>
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
    const table = $('#datatable-responsive').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'print'],
    });



    document.querySelectorAll('a.toggle-vis').forEach((el) => {
            el.addEventListener('click', function (e) {
                e.preventDefault();
         
                let columnIdx = e.target.getAttribute('data-column');
                let column = table.column(columnIdx);
         
                // Toggle the visibility
                column.visible(!column.visible());
            });
        });
    jQuery(".select2").select2({
            width: '100%'
    });

});
</script>



