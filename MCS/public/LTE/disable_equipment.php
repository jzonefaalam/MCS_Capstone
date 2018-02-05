<?php
include "dbcon.php";

	$equipmentID = $_POST['equipmentID'];
	$edit = "UPDATE equipmenttbl SET  equipmentAvailability = 0 where equipmentID = $equipmentID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		echo "<script>alert('Inserted Successfully!')</script>";
		header('location:equipment.php');                        
	}

?>