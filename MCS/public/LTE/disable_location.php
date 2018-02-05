<?php
include "dbcon.php";
if(isset($_POST['disableLocationBtn'])){
	$locationID = $_POST['locationID'];
	$locationStatus = 1;
	$locationAvailability = 0;
	$edit = "UPDATE locationtbl SET locationAvailability = 0 where locationID = $locationID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		echo "<script>alert('Inserted Successfully!')</script>";
		header('location:location.php');                        
	}
}
?>