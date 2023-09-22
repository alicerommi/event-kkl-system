<?php
include '../includes/qrcode_lib/qrlib.php';
$domain_name = "";
function removeDirectories($directory) {
    if (!is_dir($directory)) {
        return;
    }

    $files = scandir($directory);
    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            $file_path = $directory . DIRECTORY_SEPARATOR . $file;
            if (is_dir($file_path)) {
                removeDirectories($file_path); // Recursively remove subdirectories
            } 
            else {

                unlink($file_path); // Remove files
            }
        }
    }
    rmdir($directory); // Remove the empty directory
}

function qrcode_generator($text, $base_path = '../images/') {

	// Specify the directory where you want to remove all subdirectories
	removeDirectories($base_path);
    // Generate a unique folder name
    $folder_name = uniqid();
    // Create the folder if it doesn't exist
    $folder_path = $base_path . $folder_name;
    if (!file_exists($folder_path)) {
        mkdir($folder_path, 0755, true); // 0755 sets permissions for the folder
    }

    // Generate a unique image name within the folder
    $image_name = uniqid() . ".png";
    $file_path = $folder_path . '/' . $image_name;

    // Error correction capability ('L')
    $ecc = 'L';
    $pixel_size = 10;
    $frame_size = 10;

    // Generates QR Code and Stores it in the folder
    QRcode::png($text, $file_path, $ecc, $pixel_size, $frame_size);

    // Return the path to the generated image
    $base_path = str_replace('../', './', $base_path);
    return "$base_path/$folder_name/$image_name";
}

if(isset($_GET['generate_qrcode'])){
    $e = $_GET['e'];
	$id = time();
	$page = $domain_name."registeration.php?token=$id&site=$e";
	echo qrcode_generator($page);
}// end generate_qrcode

if(isset($_GET['generate_qr_code_exit'])){
	
	$link = $domain_name."leaving.php";
	echo qrcode_generator($link, $base_path="../exit_images/");
}// end generate_qrcode
?>