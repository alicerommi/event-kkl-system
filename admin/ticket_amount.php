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
                                            <h3 class="panel-title"><?php echo  get_hebrew_text("Change the ticket limit default"); ?></h3>
                                        </div>
                                        <div class="panel-body">
                                             <?php
                                                    if (isset($_SESSION['msg']))
                                                        {messages($_SESSION['msg'],"danger");
                                                            unset($_SESSION['msg']);
                                                        }
                                                    

                                                    if (isset($_GET['success']))
                                                    {
                                                            if ($_GET['success'] ==1)
                                                                messages("Ticket Amount is updated successfully","success");
                                                            else
                                                                messages("DB error","warning");
                                                           

                                                    }

                                                ?>
                                                   
                                                        
                                                        <form action="actions/update.php" method="post">

                                                                <?php
                                                                    $query = mysqli_query($conn,"select* from ticket_limit limit 1");
                                                                    $row = mysqli_fetch_assoc($query);
                                                                    $ticket_limit_number = $row['ticket_limit_number'];
                                                                ?>

                                                                <div class="form-group">
                                                                    <label> <?php echo  get_hebrew_text("Enter the amount of tickets (For All Cities)"); ?></label>
                                                                    <input type="number" name="ticket_amount" id="ticket_amount" class="form-control" min="1" required value="<?php echo $ticket_limit_number; ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" name="update_ticker_amount" class="btn btn-success"><?php echo  get_hebrew_text("Save"); ?></button>
                                                                </div>

                                                        </form>
                                                    
                                        </div>
                                    </div>  
                                </div>


                                <div class="col-md-8">

                                          <div class="panel panel-default panel-fill" style="direction: rtl;">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><?php echo  get_hebrew_text("Change the ticket limit for any city"); ?></h3>
                                        </div>
                                        <div class="panel-body">


                                                    <?php
                                                    if (isset($_SESSION['error_2']))
                                                        {messages($_SESSION['error_2'],"danger");
                                                            unset($_SESSION['error_2']);
                                                        }


                                                      if (isset($_SESSION['msg_2']))
                                                        {messages($_SESSION['msg_2'],"success");
                                                            unset($_SESSION['msg_2']);
                                                        }

                                                ?>
                                                   




                                                        <form action="actions/update.php" method="post">
                                                            <div class="form-group">
                                                                 <label> <?php echo  get_hebrew_text("Choose City"); ?></label>
                                                                <select class="form-control select2" id="list_of_cities" name="city_id">
                                                                            <?php
                                                                                $query_city = mysqli_query($conn,"select * from cities order by city_name");
                                                                                while($row_query_city= mysqli_fetch_assoc($query_city)){
                                                                                    $cid = $row_query_city['city_id']; 
                                                                                    $city_name = $row_query_city['city_name'];
                                                                                         echo '<option value = "'.$cid.'">'.$city_name.'</option>';
                                                                                } 
                                                                            ?>
                                                                </select>
                                                            </div>
                                                                

                                                                <div class="form-group">
                                                                    <label> <?php echo  get_hebrew_text("Enter the amount of tickets (For Above selected city)"); ?></label>
                                                                    <input type="number" name="ticket_amount__" id="ticket_amount__" class="form-control" min="1" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" name="update_ticker_amount_for_each_city" class="btn btn-success"><?php echo  get_hebrew_text("Save"); ?></button>
                                                                </div>

                                                        </form>
                                                    
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
           
            jQuery(".select2").select2({
                    width: '100%'
            });


            $("#list_of_cities").change(function(){
                    let cid = $(this).find(":selected").val();
                    $.ajax({

                        'url':'actions/fetch.php',
                        'method':'POST',
                        data:{
                            'city_id':cid,
                            'get_ticket_info':1
                        },
                        'dataType':'JSON',
                        success:function(data){
                           $("#ticket_amount__").empty().val(data["limit_of_tickets"]);
                        }
                    });
            });
          
});
</script>