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
            <img id="qr-code-image" src="" alt="QR Code">
            <p class="instructions">Scan the QR Code with your mobile device <br/>for visiting last page</p>
        </div>
    </div>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const ajaxQRCodeUrl = "actions/generate_qr_code.php?generate_qr_code_exit=1";
        function updateQRCodeImage() {
            $.get(ajaxQRCodeUrl, function(data) {
                $("#qr-code-image").attr("src", data);
            });
        }
        // Call the function to update the QR code image
        updateQRCodeImage();
      
    </script>
</body>
</html>