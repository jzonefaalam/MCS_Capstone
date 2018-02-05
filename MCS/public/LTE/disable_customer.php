<?php
include "dbcon.php";
if(isset($_POST['disableCustomerBtn'])){
	$customerID = $_POST['disableCustomerID'];
	$edit = "UPDATE customertbl SET  customerAvail = 0 where customerID = $customerID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		echo "<script>alert('Inserted Successfully!')</script>";
		header('location:reservation.php');                        
	}
}
?>