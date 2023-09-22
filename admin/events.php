<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                           

                                <div class="col-md-4">
                                    <div class="panel panel-default panel-fill" style="direction: rtl;">
                                        <div class="panel-heading">
                                            <h3 class="panel-title" id="form_title"><?php echo  get_hebrew_text("Add A New Event"); ?></h3>
                                        </div>
                                        <div class="panel-body">
                                             <?php
                                                    if (isset($_SESSION['msg_e']))
                                                        {messages($_SESSION['msg_e'],"danger");
                                                            unset($_SESSION['msg_e']);
                                                        }

                                                         if (isset($_SESSION['msg_s']))
                                                        {messages($_SESSION['msg_s'],"success");
                                                            unset($_SESSION['msg_s']);
                                                        }

                                                ?>
                                                    
                                                        
                                                        <form action="actions/insert.php" method="post" id="form_entry">

                                                                <div class="form-group">
                                                                    <label> <?php echo get_hebrew_text("Event Name"); ?></label>
                                                                    <input type="text" name="event_name" required id="event_name" class="form-control">
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" name="add_event" id="add_event"  class="btn btn-success"><?php echo  get_hebrew_text("Save"); ?></button>
                                                                </div>

                                                        </form>
                                                    
                                        </div>
                                    </div>  
                                </div>


                                <div class="col-md-8" >

                                          <div class="panel panel-default panel-fill" style="direction: rtl;">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><?php echo get_hebrew_text("Events"); ?></h3>
                                        </div>
                                        <div class="panel-body">
                                             <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th><?php  echo get_hebrew_text("Event Name");  #echo get_hebrew_text("City"); ?> </th>
                                                                    <th><?php  echo get_hebrew_text("Actions"); #echo get_hebrew_text("Email"); ?> </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    <?php
                                                                     $query = mysqli_query($conn,"select * from events");
                                                                        while($row = mysqli_fetch_array($query)){
                                                                            $unique_id = $row['unique_id'];
                                                                            $event_id = $row['event_id'];

                                                                            $edit = "<button id='".$unique_id."' type='button' title='Edit This Entry' class='btn btn-success edit_btn' ><i class='fa fa-pencil'></i></button> ";


                                                                            $view_events_ = "<a href='registerations_records.php?event_id=".$event_id."' title='View Registerations' class='btn btn-purple'><i class='fa fa-list'></i></a> ";


                                                                            $link = "<a href='../entry_code.php?entry_code=".$unique_id."' title='".get_hebrew_text('QR Code Link')."' target='_blank' class='btn btn-primary'><i class='fa fa-eye'></i></a> ".$edit.$view_events_;



                                                                                echo '<tr id="row_'.$unique_id.'">

                                                                                    <td>'.$row["event_id"].'</td>
                                                                                    <td id="event_'.$unique_id.'">'.$row["event_name"].'</td>
                                                                                    <td>'.$link.'</td>
                                                                                </tr>';
                                                                        }
                                                                    ?>

                                                            </tbody>
                                                        </table>


                                                    <?php
                                                        

                                                    ?>
                                        </div>
                                </div>
                                </div>

                       
                        </div>
                    </div> 
                </div> 
            </div>
<?php
    include 'includes/footer.php';
?><script type="text/javascript">
$(document).ready(function() {
    $('#datatable-responsive').DataTable();

    $(".edit_btn").click(function(){
        let id = $(this).attr('id');
        $("#form_title").empty().append("Edit Event Name");
        let event_name = $("#event_"+id).text();
        $("#event_name").val(event_name);
        $("#form_entry").attr('action','actions/update.php');
        $("#add_event").html("Update");
        $("#form_entry").append('<input type="hidden" name="event_id"  value="'+id+'">');
    });
    
});
</script>