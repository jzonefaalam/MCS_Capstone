<?php
include "dbcon.php";

	$enablePackageID = $_POST['packageID'];
	$edit = "UPDATE packagetbl SET  packageAvailability = 1 where packageID = $enablePackageID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		echo "<script>document.location='package.php'</script>";
			                   
	}

?>