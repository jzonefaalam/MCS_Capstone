<?php
include "dbcon.php";
if(isset($_POST['enableLocationBtn'])){
	$locationID = $_POST['locationID'];
	$edit = "UPDATE locationtbl SET locationAvailability = 1 where locationID = $locationID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		echo "<script>alert('Inserted Successfully!')</script>";
		header('location:location.php');                        
	}
}
?>