<?php
// The back-end then will determine if the username is available or not,
// and finally returns a JSON { "valid": true } or { "valid": false }
// The code bellow demonstrates a simple back-end written in PHP

// Get the username from request
include "dbcon.php";
$editDishName = $connect->real_escape_string($_POST['editDishName']);
$editDishID = $_POST['editDishID'];
// Check its existence (for example, execute a query from the database) ...
$isAvailable = true; // or false
$query = "SELECT dishName FROM coursetbl WHERE dishName = '$editDishName' and dishStatus=1 and dishID <> $editDishID";
$result = $connect->query($query);
if(mysqli_num_rows($result)>0)
{
	$isAvailable = false;
}
// Finally, return a JSON
echo json_encode(array(
    'valid' => $isAvailable,
));