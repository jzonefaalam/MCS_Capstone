<?php
include "dbcon.php";
if(isset($_POST['disableEventBtn'])){
	$eventID = $_POST['eventTypeID'];
	$eventStatus = 1;
	$eventAvailability = 0;
	$edit = "UPDATE eventtypetbl SET eventTypeAvailability = 0 where eventTypeID = $eventID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		echo "<script>alert('Inserted Successfully!')</script>";
		header('location:event.php');                        
	}
}
?>