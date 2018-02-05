<?php
include "dbcon.php";
if(isset($_POST['disableDishBtn'])){
	$menuID = $_POST['dishID'];
	$menuStatus = 1;
	$menuAvailability = 0;
	$edit = "UPDATE coursetbl SET dishAvailability=$menuAvailability where dishID = $menuID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		echo "<script>alert('Inserted Successfully!')</script>";
		header('location:menu.php');                        
	}
}
?>