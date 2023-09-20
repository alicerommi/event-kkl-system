<?php
        include 'includes/header.php';
?>                    
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center" style="background-image:url('assets/images/big/bg.jpg')">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="<?php echo $admin_pic; ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h3 class="text-white"><?php echo $admin_name;?></h3>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-lg-12" style="    margin-top: 20px; direction: rtl;"> 
                                <?php
                                        if(isset($_GET['updated'])){
                                                    if($_GET['updated']==1){
                                                        echo '<div class="alert alert-success">'.get_hebrew_text("Details updated").'</div>';
                                                    }else if($_GET['updated']==0){
                                                           echo '<div class="alert alert-warning">'.get_hebrew_text("Error in updating details").'</div>';
                                                    }
                                        }
                                             
                                             

                                              if(isset($_GET['passmismatch'])){
                                                if($_GET['passmismatch']==1)
                                                     echo '<div class="alert alert-danger">'.get_hebrew_text("The current password is mismatched").'</div>';
                                              }

                                ?>
                                <div class="row">
                                                              
                                <div class="col-md-12">
                                          <div class="panel panel-default panel-fill"  style=" direction: rtl;">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title"> <?php echo get_hebrew_text("Edit Your Profile"); ?></h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div id = "updateErr"></div>
                                        <form role="form" method="post" id="updateAdminUpdate" action = "actions/update.php" enctype="multipart/form-data">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Update Image</label>
                                                    <input type="file" name="image" id="image" class="form-control" accept=".jpg, .jpeg, .png">
                                                </div>
                                            <input type="hidden" value="<?php echo $admin_id; ?>" name="admin_id">
                                            <div class="form-group">
                                                <label for="FullName"> <?php echo get_hebrew_text("Full Name"); ?></label>
                                                <input type="text" value="<?php echo $admin_name; ?>" id="FullName" required name=" <?php echo get_hebrew_text("FullName"); ?>" class="form-control"  required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email"> <?php echo get_hebrew_text("Email"); ?></label>
                                                <input type="email" value="<?php echo $admin_email; ?>" id="Email" name="Email" class="form-control" readonly >
                                            </div>
                                             
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Password"> <?php echo get_hebrew_text("New Password"); ?></label>
                                                <input type="password" id="Password" name="Password" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="current_pass"> <?php echo get_hebrew_text("Current Password"); ?></label>
                                                <input type="password" id="current_pass" name="current_pass" class="form-control" required>
                                            </div>


                                         
                                        </div>
                                          <div class="form-group text-right">
                                            <button class="btn btn-primary waves-effect waves-light w-md text-right" type="submit" name="saveProfiel"><?php echo get_hebrew_text("Update Info."); ?></button>
                                        </div>
                                        </form>

                                    </div> 
                                </div>

                                </div>
                            </div> 
                        </div> 
                    </div>
                    </div>
                </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
            include 'includes/footer.php';
?>
<script type="text/javascript">
    $(document).ready(function(){
            $(document).on('focusout','#RePassword',function(){
                        var confirm_pass = $(this).val();
                        var pass = $("#Password").val();
                        if(pass.length>6){
                                if(pass!=confirm_pass){
                                      $("#updateErr").empty().append('<div class="alert alert-warning">Both passwords are mismatched.</div>');
                                      $(this).val("");          
                                }
                        }else{
                            $("#updateErr").empty().append('<div class="alert alert-warning">Password length must be greater than 6</div>');
                                 $(this).val(""); 
                        }
                                setTimeout(function(){
                                           $("#updateErr").empty();
                                },20000);
                            });
    });
</script>