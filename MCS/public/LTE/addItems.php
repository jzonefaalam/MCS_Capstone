<?php
include "dbcon.php";

if(isset($_POST['addDishBtn'])){
	$menuName = $_POST['addDishName'];
	$menuPrice = $_POST['addDishPrice'];
	$menuDesc = $_POST['addDishDesc'];
	$menuType = $_POST['addDishType'];
	$menuStatus = 1;
	$menuAvailability = 1;
	$image = $_FILES['addDishImage']['name'];
	if ($image==""){
		$search = "SELECT * from coursetypetbl where dishTypeID = '$menuType'";
		$result = mysqli_query($connect,$search);
		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		        $courseTypeImage = $row['dishTypeImage'];
		    }
		}
        if($result!=null){
			$insert = "INSERT INTO coursetbl (dishName, dishDescription, dishCost, dishTypeID, dishAvailability, dishStatus, imageName) VALUES ('$menuName', '$menuDesc', '$menuPrice', '$menuType', '$menuAvailability','$menuStatus','$courseTypeImage')";
			$execute = mysqli_query($connect, $insert);
			if($execute){
			header('location:menu.php?message=2');
			}
		}
	}
	else{
		$maxsize    = 2097152;
		$acceptable = array(
		'application/pdf',
		'image/jpeg',
		'image/jpg',
		'image/gif',
		'image/png'
		);
		if(($_FILES['addDishImage']['size'] < $maxsize)) {
        	if(in_array($_FILES['addDishImage']['type'], $acceptable)) {
				$target = "images/".basename($_FILES['addDishImage']['name']);
				$insert = "INSERT INTO coursetbl (dishName, dishDescription, dishCost, dishTypeID, dishAvailability, dishStatus, imageName) VALUES ('$menuName', '$menuDesc', '$menuPrice', '$menuType', '$menuAvailability','$menuStatus','$image')";
				$execute = mysqli_query($connect, $insert);
				if($execute){
					if (move_uploaded_file($_FILES['addDishImage']['tmp_name'], $target)){
						header('location:menu.php?message=2');
					}
				}
		    }
		    else{
		    	header('location:menu.php?message=7');
		    }
    	}
    	else{
    		header('location:menu.php?message=8');
    	}
		
	}
}

if(isset($_POST['addDishTypeBtn'])){
	$menuTypeName = $_POST['dishTypeName'];
	$menuTypeDesc = $_POST['dishTypeDescription'];
	$menuTypeStatus = 1;
	$image = $_FILES['dishTypeImage']['name'];
	$maxsize    = 2097152;
	$acceptable = array(
	'image/jpeg',
	'image/jpg',
	'image/gif',
	'image/png'
	);

	if($image==""){
					$defaultImage = 'logo.png';
					$insert = "INSERT INTO coursetypetbl (dishTypeName, dishTypeDescription, dishTypeStatus, dishTypeImage) VALUES ('$menuTypeName', '$menuTypeDesc', '$menuTypeStatus','$defaultImage')";
						$execute = mysqli_query($connect, $insert);
					if($execute){
						header('location:menu_type.php?message=2');
					}
		}
		else{
			if($_FILES['dishTypeImage']['size'] < $maxsize) {
	        	if(in_array($_FILES['dishTypeImage']['type'], $acceptable)) {
	        		
						$target = "images/".basename($_FILES['dishTypeImage']['name']);
						$insert = "INSERT INTO coursetypetbl (dishTypeName, dishTypeDescription, dishTypeStatus, dishTypeImage) VALUES ('$menuTypeName', '$menuTypeDesc', '$menuTypeStatus','$image')";
						$execute = mysqli_query($connect, $insert);
						if($execute){
							if (move_uploaded_file($_FILES['dishTypeImage']['tmp_name'], $target)){
								header('location:menu_type.php?message=2');
							}
						}
					
			    }
			    else{
			    	header('location:menu_type.php?message=7');
			    }
	    	}
	    	else{
	    		header('location:menu_type.php?message=8');
	    	}
    	}
}

if(isset($_POST['addEmployeeBtn'])){
	$employeeName = $_POST['addEmployeeName'];
	$employeeType = $_POST['addEmployeeType'];
	$employeeStatus = 1;
	$employeeAvailability = 1;
	$maxsize    = 2097152;
		$acceptable = array(
		'application/pdf',
		'image/jpeg',
		'image/jpg',
		'image/gif',
		'image/png'
		);
	$image = $_FILES['addEmployeeImage']['name'];

		if($image==""){
			$defaultImage = 'logo.png';
					$insert = "INSERT INTO employeetbl (employeeName, employeeStatus, employeeTypeID, employeeAvailability, employeeImage) VALUES ('$employeeName', 1, '$employeeType', 1, '$defaultImage')";
					$execute = mysqli_query($connect, $insert);
					if($execute){
						header('location:employee.php?message=2');
					}
		}
		else{
			if(($_FILES['addEmployeeImage']['size'] < $maxsize)) {
	        	if(in_array($_FILES['addEmployeeImage']['type'], $acceptable)){
						$target = "images/".basename($_FILES['addEmployeeImage']['name']);
						$insert = "INSERT INTO employeetbl (employeeName, employeeStatus, employeeTypeID, employeeAvailability, employeeImage) VALUES ('$employeeName', 1, '$employeeType', 1, '$image')";
						$execute = mysqli_query($connect, $insert);
						if($execute){
							if (move_uploaded_file($_FILES['addEmployeeImage']['tmp_name'], $target)){
								header('location:employee.php?message=2');
							}
						}
				}
			    
			    else{
			    	header('location:employee.php?message=7');
			    }
	    	}
	    	else{
	    		header('location:employee.php?message=8');
	    	}
	}
}

if(isset($_POST['addEmployeeTypeBtn'])){
	$employeeTypeName = $_POST['addEmployeeType'];
	$employeeRatePerHour = $_POST['addEmployeeRatePerHour'];
	$employeeTypeStatus = 1;

	$insert = "INSERT INTO employeetypetbl (employeeTypeName, employeeRatePerHour, employeeTypeStatus) values ('$employeeTypeName', '$employeeRatePerHour', 1)";
	$execute = mysqli_query($connect, $insert);
	if($execute){
		header('location:employee_type.php?message=2');
	}
}

if(isset($_POST['addEquipmentBtn'])){
	$equipmentName = $_POST['addEquipmentName'];
		$equipmentRatePerHour = $_POST['addEquipmentRatePerHour'];
		$equipmentDescription = $_POST['addEquipmentDescription'];
		$equipmentUnit = $_POST['addEquipmentUnit'];
		$image = $_FILES['addEquipmentImage']['name'];
		$maxsize    = 2097152;
		$acceptable = array(
		'image/jpeg',
		'image/jpg',
		'image/gif',
		'image/png'
		);
		if($image==""){
			$defaultImage = 'location.jpg';
			$insert = "INSERT INTO equipmenttbl (equipmentName, equipmentDescription, equipmentRatePerHour, equipmentUnit, equipmentStatus, equipmentAvailability, equipmentImage) VALUES ('$equipmentName', '$equipmentDescription', '$equipmentRatePerHour', '$equipmentUnit', 1, 1, '$defaultImage')";
			$execute = mysqli_query($connect,$insert);
			if($execute){
				header('location:equipment.php?message=2');
			}
		}
		else{
			if($_FILES['addEquipmentImage']['size'] < $maxsize) {
	        	if(in_array($_FILES['addEquipmentImage']['type'], $acceptable)) {
	        			$target = "images/".basename($_FILES['addEquipmentImage']['name']);
						$insert = "INSERT INTO equipmenttbl (equipmentName, equipmentDescription, equipmentRatePerHour, equipmentUnit, equipmentStatus, equipmentAvailability, equipmentImage) VALUES ('$equipmentName', '$equipmentDescription', '$equipmentRatePerHour', '$equipmentUnit', 1, 1, '$image')";
						$execute = mysqli_query($connect,$insert);
						if($execute){
							if (move_uploaded_file($_FILES['addEquipmentImage']['tmp_name'], $target)){
								header('location:equipment.php?message=2');
							}
						}
			    }
			    else{
			    	header('location:equipment.php?message=7');
			    }
	    	}
	    	else{
	    		header('location:equipment.php?message=8');
	    	}
    	}
}

if(isset($_POST['addEventBtn'])){
	$eventName = $_POST['addEventName'];
	$eventDescription = $_POST['addEventDescription'];
	$eventStatus = 1;
	$eventAvailability = 1;
	$insert = "INSERT INTO eventtypetbl (eventTypeName, eventTypeDescription, eventTypeAvailability, eventTypeStatus) VALUES ('$eventName', '$eventDescription', '$eventAvailability', '$eventStatus')";
	$execute = mysqli_query($connect,$insert);

	if($execute){
		header('location:event.php?message=2');
	}
}

if(isset($_POST['addLocationBtn'])){
	$locationName = $_POST['addLocationName'];
	$locationDescription = $_POST['addLocationDescription'];
	$locationAddress = $_POST['addLocationAddress'];
	$locationContactPerson = $_POST['addLocationContactPerson'];
	$locationContactNumber = $_POST['addLocationContactNumber'];
	$locationCapacity = $_POST['addLocationCapacity'];
	$locationFee = $_POST['addLocationFee'];
	$locationAvailability = 1;
	$locationStatus = 1;
	$image = $_FILES['addLocationImage']['name'];
	if ($image==""){

		$locationImage = 'location.jpg';
		$insert = "INSERT INTO locationtbl (locationName, locationContactPerson, locationContactNumber, locationDescription, locationCapacity, locationFee, locationAddress, locationAvailability, locationStatus, imageName) VALUES ('$locationName', '$locationContactPerson', '$locationContactNumber', '$locationDescription', '$locationCapacity', '$locationFee', '$locationAddress', '$locationAvailability', '$locationStatus', '$locationImage')";
		$execute = mysqli_query($connect, $insert);
		if($execute){
			echo "<script>alert('Inserted Successfully!'); document.location='location.php'</script>";
		}
	}
	else{
		$target = "images/".basename($_FILES['addLocationImage']['name']);
		$insert = "INSERT INTO locationtbl (locationName, locationContactPerson, locationContactNumber, locationDescription, locationCapacity, locationFee, locationAddress, locationAvailability, locationStatus, imageName) VALUES ('$locationName', '$locationContactPerson', '$locationContactNumber', '$locationDescription', '$locationCapacity', '$locationFee', '$locationAddress', '$locationAvailability', '$locationStatus', '$image')";
		$execute = mysqli_query($connect, $insert);
		if($execute){
			if (move_uploaded_file($_FILES['addLocationImage']['tmp_name'], $target)){
				echo "<script>alert('Inserted Successfully!'); document.location='location.php'</script>";
				
			}
		}
	}
}

if(isset($_POST['addPackageBtn'])){
	$packageName = $_POST['addPackageName'];
	$packagePrice = $_POST['addPackagePrice'];
	$packageDesc = $_POST['addPackageDesc'];
	$packageInclusion = implode(', ', $_POST['addPackageInclusion']);
	$packageStatus = 1;
	$image = $_FILES['addPackageImage']['name'];
	$maxsize    = 2097152;
		$acceptable = array(
		'image/jpeg',
		'image/jpg',
		'image/gif',
		'image/png'
		);

		if($image==""){
			$defaultImage = 'logo.png';
					$insert = "INSERT INTO packagetbl (packageName, packageDescription, packageCost, packageInclusion, packageStatus, packageAvailability, imageName) VALUES ('$packageName', '$packageDesc', '$packagePrice', '$packageInclusion', 1, 1, '$defaultImage')";
					$execute = mysqli_query($connect, $insert);
					if($execute){
						header('location:package.php?message=2');
					}
		}
		else{
			if($_FILES['addPackageImage']['size'] < $maxsize) {
	        	if(in_array($_FILES['addPackageImage']['type'], $acceptable)) {
	        		
						$target = "images/".basename($_FILES['addPackageImage']['name']);
						$insert = "INSERT INTO packagetbl (packageName, packageDescription, packageCost, packageInclusion, packageStatus, packageAvailability, imageName) VALUES ('$packageName', '$packageDesc', '$packagePrice', '$packageInclusion', 1, 1, '$image')";
						$execute = mysqli_query($connect, $insert);
						if($execute){
							if (move_uploaded_file($_FILES['addPackageImage']['tmp_name'], $target)){
								header('location:package.php?message=2');
							}
						}
					
			    }
			    else{
			    	header('location:package.php?message=7');
			    }
	    	}
	    	else{
	    		header('location:package.php?message=8');
	    	}
    	}
}

if(isset($_POST['addServiceBtn'])){
	$serviceName = $_POST['addServiceName'];
	$serviceFee = $_POST['addServiceFee'];
	$serviceDescription = $_POST['addServiceDescription'];
	$serviceStatus = 1;
	$insert = "INSERT INTO servicetbl (serviceName, serviceDescription, serviceFee, serviceStatus) VALUES ('$serviceName', '$serviceDescription', '$serviceFee', '$serviceStatus')";
	$execute = mysqli_query($connect, $insert);
	if($execute){
			header('location:service.php?message=2');
	}                         
}




?>