<?php
// The back-end then will determine if the username is available or not,
// and finally returns a JSON { "valid": true } or { "valid": false }
// The code bellow demonstrates a simple back-end written in PHP

// Get the username from request
include "dbcon.php";
$addPackageName = $connect->real_escape_string($_POST['addPackageName']);

// Check its existence (for example, execute a query from the database) ...
$isAvailable = true; // or false
$query = "SELECT packageName FROM packagetbl WHERE packageName = '$addPackageName' and packageStatus=1";
$result = $connect->query($query);
if(mysqli_num_rows($result)>0)
{
	$isAvailable = false;
}
// Finally, return a JSON
echo json_encode(array(
    'valid' => $isAvailable,
));