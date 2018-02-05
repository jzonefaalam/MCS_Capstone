<?php
include "dbcon.php";

	$serviceID = $_POST['serviceID'];
	$edit = "UPDATE servicetbl SET  serviceAvailability = 0 where serviceID = $serviceID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
		echo "<script>document.location='service.php'</script>";                   
;                        
	}

?>