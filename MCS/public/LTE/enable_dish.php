<?php
include "dbcon.php";
if(isset($_POST['enableDishBtn'])){
	$menuID = $_POST['dishID'];
	$menuAvailability = 1;
	$edit = "UPDATE coursetbl SET dishAvailability=$menuAvailability where dishID = $menuID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		echo "<script>alert('Inserted Successfully!')</script>";
		header('location:menu.php');                        
	}
}
?>