<?php
include "dbcon.php";

if(isset($_POST['deleteDishBtn'])){
	$menuID = $_POST['dishID'];
	$edit = "UPDATE coursetbl SET dishStatus = 0 where dishID = $menuID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
			header('location:menu.php?message=6');                     
	}
}

if(isset($_POST['deleteDishTypeBtn'])){
	$menuTypeID = $_POST['dishTypeID'];
	$edit = "UPDATE coursetypetbl SET dishTypeStatus = 0 where dishTypeID = '$menuTypeID'";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		header('location:menu_type.php?message=6');                 
	}
}

if(isset($_POST['deleteEmployeeBtn'])){
	$employeeID = $_POST['employeeID'];
	$edit = "UPDATE employeetbl SET employeeStatus = 0 where employeeID = $employeeID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		header('location:employee.php?message=6');                   
	}
}

if(isset($_POST['deleteEmployeeTypeBtn'])){
	$employeeTypeID = $_POST['employeeTypeID'];
	$edit = "UPDATE employeetypetbl SET employeeTypeStatus = 0 where employeeTypeID = '$employeeTypeID'";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		header('location:employee_type.php?message=6');                      
	}
}

if(isset($_POST['deleteEquipmentBtn'])){
	$equipmentID = $_POST['equipmentID'];
	$edit = "UPDATE equipmenttbl SET equipmentStatus = 0 where equipmentID = $equipmentID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		header('location:equipment.php?message=6');                      
	}
}

if(isset($_POST['deleteEventBtn'])){
	$eventTypeID = $_POST['eventTypeID'];
	$edit = "UPDATE eventtypetbl SET eventTypeStatus = 0 where eventTypeID = '$eventTypeID'";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		header('location:event.php?message=6');                 
	}
}

if(isset($_POST['deleteLocationBtn'])){
	$locationID = $_POST['deleteLocationID'];
	$edit = "UPDATE locationtbl SET locationStatus = 0 where locationID = $locationID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		header('location:location.php?message=6');                         
	}
}

if(isset($_POST['deletePackageBtn'])){
	$packageID = $_POST['packageID'];
	$edit = "UPDATE packagetbl SET packageStatus = 0 where packageID = $packageID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		header('location:package.php?message=6');                        
	}
}

if(isset($_POST['deleteServiceBtn'])){
	$serviceID = $_POST['serviceID'];
	$edit = "UPDATE servicetbl SET  serviceStatus = 0 where serviceID = $serviceID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		header('location:service.php?message=6');                   
	}
}

?>