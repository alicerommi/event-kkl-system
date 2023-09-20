<?php
    #include 'includes/database_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="qr-code">
            <img id="qr-code-image" src="./assets/sample.png" alt="QR Code">
            <p class="instructions" style="display: none;">Scan the QR Code with your mobile device <br/> for Registeration</p>
            <div class="form-group">
                <button style="background-color: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px;" id="generate_code">Generate QR Code</button>
            </div>
        </div>
    </div>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const ajaxQRCodeUrl = "actions/generate_qr_code.php?generate_qrcode=1";
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