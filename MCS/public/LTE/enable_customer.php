<?php
include "dbcon.php";
if(isset($_POST['enableCustomerBtn'])){
	$customerID = $_POST['enableCustomerID'];	
	$edit = "UPDATE customertbl SET  customerAvail = 1 where customerID = $customerID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		echo "<script>alert('Inserted Successfully!')</script>";
		header('location:reservation.php');                        
	}
}
?>