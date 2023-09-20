<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">

                                <div class="alert alert-info" id="msg_" style="display: none;">
                                   
                                </div>
                                <div class="col-md-4">
                                            <div class="panel panel-default" style="direction: rtl;">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><?= get_hebrew_text("Scan QR Code with Mobile Rear Camera")?></h3>
                                                </div>
                                                <div class="panel-body"> 
                                                        <div class="form-group">
                                                            <button  class="btn btn-success" id="startButton">Start</button>
                                                            <button class="btn btn-info" id="resetButton">Reset</button>
                                                        </div>

                                                        <div class="form-group">
                                                            <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
                                                        </div>

                                                        <div id="sourceSelectPanel" style="display:none">
                                                                <label for="sourceSelect">Change video source</label>
                                                                <div class="form-group">
                                                                    <select id="sourceSelect" class="form-control" style="max-width:400px"></select>
                                                                </div>

                                                            <!-- <label>Result</label>
                                                            <pre><code id="result"></code></pre> -->
                                                            <label>Result</label>
                                                            <code id="result"></code>

                                                             <pre><code id="result_2"></code></pre>
                                                        </div>
                                                </div>
                                                
                                        </div>

                            </div>
                                <div class="col-md-8">
                                            <div class="panel panel-default" style="direction: rtl;">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><?= get_hebrew_text("History of Scanned QR Codes")?></h3>
                                                </div>
                                                <div class="panel-body"> 
                                                       
                                                     <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th><?php echo get_hebrew_text("Name"); ?> </th>
                                                                    <th><?php echo get_hebrew_text("City"); ?> </th>
                                                                    <th><?php echo get_hebrew_text("Arrival Datetime"); ?> </th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                         <tbody>
                                                            <?php
                                                            $query = mysqli_query($conn, "SELECT * FROM `booking_track` inner join cities on cities.city_id = booking_track.city_id and booking_track.arrived_status=1 order by booking_track.arrived_datetime desc");
                                                                    
                                                                    while($row = mysqli_fetch_array($query)){
                                                                        $city_name = $row['city_name']; 
                                                                        $person_name = $row['person_name'];
                                                                        $ticket_id = $row['ticket_id'];
                                                                        $arrived_datetime= human_timedate( $row['arrived_datetime']);
                                                                        echo '<tr>
                                                                                 <td>'.$ticket_id.'</td>
                                                                                <td>'.$person_name.'</td>
                                                                                <td>'.$city_name.'</td>
                                                                                <td>'.$arrived_datetime.'</td>
                                                                        </tr>';
   
                                                            }
                                                            ?>
                                                         </tbody>
                                                        </table>
                                                     </table>


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
<!-- Sweet-Alert  -->
<script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/@zxing/library@latest/umd/index.min.js"></script>
<script type="text/javascript">
     $('#datatable-responsive').DataTable();
    function getQRCode(json)
    {
        json = JSON.parse(json);
        $.ajax({
            'method':'POST',
            'url':'actions/update.php',
            'data':{
                'ticket_id':json['ticket_id'],
                'name':json['name'],
                'city_id':json['city_id'],
                'booking_datetime':json['booking_datetime'],
                'update_qr_data':1,
            },
            'dataType':'JSON',
            success: function(data){
                if (data["success"]==1)
                    {
                        // swal("Horay!",data["msg"], "success");

                        swal({  
                           type: "success",    
                            title: "Horay!",   
                            text: data["msg"],  
                            timer: 10000,   
                            showConfirmButton:true 
                        }); 

                        $("#resetButton").click();
                        
                        $("#msg_").html("Info: Please start with new QR Code.").show();
                        setTimeout(function(){
                            $("#msg_").empty().hide();
                        },10000);


                    }
                else
                    {
                        //swal("Invalid", data["msg"], "error", timer: 2000);  

                         swal({  
                           type: "error",    
                            title: "Invalid",   
                            text: data["msg"],  
                            timer: 10000,   
                            showConfirmButton:true 
                        }); 
                        
                        $("#msg_").html(data["msg"]).show();
                        setTimeout(function(){
                            $("#msg_").empty().hide();
                        },10000);
                    }
            }
        });

    }  //end getQRCode fun here

    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            selectedDeviceId = videoInputDevices[videoInputDevices.length - 1].deviceId
          }
          // if (videoInputDevices.length >= 1) {
          //   videoInputDevices.forEach((element) => {
          //     const sourceOption = document.createElement('option')
          //     sourceOption.text = element.label
          //     sourceOption.value = element.deviceId
          //     sourceSelect.appendChild(sourceOption)
          //   })

          //   sourceSelect.onchange = () => {
          //     selectedDeviceId = sourceSelect.value;
          //   };

          //   const sourceSelectPanel = document.getElementById('sourceSelectPanel')
          //   sourceSelectPanel.style.display = 'block'
          // }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                
                document.getElementById('result_2').textContent = result.text;
                
                document.getElementById('result').textContent = "QR Code Reading Process Has Completed";

                getQRCode(result.text);

              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                //console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })
  </script>


