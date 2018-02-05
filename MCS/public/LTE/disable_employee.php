<?php
include "dbcon.php";
if(isset($_POST['disableEmployeeBtn'])){
	$enableEmployeeID = $_POST['employeeID'];
	$edit = "UPDATE employeetbl SET  employeeAvailability = 0 where employeeID = $enableEmployeeID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		echo "<script>alert('Inserted Successfully!')</script>";
		header('location:employee.php');                        
	}
}
?>