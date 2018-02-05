<?php
include "dbcon.php";

	$disablePackageID = $_POST['packageID'];
	$edit = "UPDATE packagetbl SET  packageAvailability = 0 where packageID = $disablePackageID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		echo "<script>document.location='package.php'</script>";                     
	}

?>