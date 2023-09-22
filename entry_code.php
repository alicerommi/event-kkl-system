<?php
    include 'includes/database_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>QR Code Display with jQuery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        .qr-code {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .qr-code img {
            width: 200px;
            height: 200px;
            margin: 20px;
        }
        .instructions {
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body>




    <div class="container">

        <?php
        $msg =  '<div class="alert alert-danger" style="direction:rtl; font-size:26px; font-weight:600;"><strong>wrong link, contact Admin for getting the correct link</strong></div>';
         if(!isset($_GET['entry_code'])   ){
                echo $msg;
                die;
         } else{
            $entry_code = $_GET['entry_code'];
            $query = mysqli_query($conn,"select * from events where unique_id='$entry_code'");
            if(mysqli_num_rows($query)==0){
                echo $msg;
                die;
            }
         }
        ?>

        <div class="qr-code">
            <img id="qr-code-image" src="./assets/sample.png" alt="QR Code">
            <p class="instructions" style="display: none;">סרוק את הקוד לקבלת גישה לעמוד רישום</p>
            <div class="form-group">
                <button style="background-color: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px;" id="generate_code">צור קוד QR</button>
            </div>
        </div>
    </div>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>

         function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        
        const ajaxQRCodeUrl = "actions/generate_qr_code.php?generate_qrcode=1&e="+getUrlParameter('entry_code');
        function updateQRCodeImage() {
            $.get(ajaxQRCodeUrl, function(data) {
                $("#qr-code-image").attr("src", data);
                //$("#qr-code-image").show();
                $(".instructions").show();
                
            });
        }
        // Call the function to update the QR code image
        //updateQRCodeImage();
        $(document).ready(function(){
            $("#generate_code").click(function(){
                updateQRCodeImage();
            });
        });
    </script>
</body>
</html>