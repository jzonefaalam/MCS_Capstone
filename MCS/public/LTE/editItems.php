<?php
include "dbcon.php";

if(isset($_POST['editDishBtn'])){
	$menuID = $_POST['editDishID'];
	$menuName = $_POST['editDishName'];
	$menuPrice = $_POST['editDishPrice'];
	$menuDesc = ($_POST['editDishDesc']);
	$menuType = $_POST['editDishType'];
	$menuStatus = 1;
	$image = $_FILES['editDishImage']['name'];	
	$menuAvailability = 1;
	$tempName = $_POST['tempName'];

	$checker = 0;


	if($tempName==$menuName){
	$checker = 1;
	}
	else{

	$query = "SELECT dishName FROM coursetbl WHERE dishName = '$menuName' and dishStatus=1";
	$result = $connect->query($query);

	if(mysqli_num_rows($result)==0)
	{
	$checker = 1;
	}
	else{
	$checker = 0;
	}	
	}

	if($checker==1){

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
	$edit = "UPDATE coursetbl SET dishName = '$menuName', dishDescription = '$menuDesc', dishCost = '$menuPrice', dishTypeID = '$menuType', imageName = '$courseTypeImage' where dishID = $menuID ";
	$execute = mysqli_query($connect, $edit);
	if($execute){
	header('location:menu.php?message=4');
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
	if(!($_FILES['editDishImage']['size'] >= $maxsize)) {
	if(in_array($_FILES['editDishImage']['type'], $acceptable)) {
	$target = "images/".basename($_FILES['editDishImage']['name']);
	$edit = "UPDATE coursetbl SET dishName = '$menuName', dishDescription = '$menuDesc', dishCost = '$menuPrice', dishTypeID = '$menuType', imageName = '$image' where dishID = $menuID ";
	$execute = mysqli_query($connect, $edit);
	if($execute){
	if (move_uploaded_file($_FILES['editDishImage']['tmp_name'], $target)){
	header('location:menu.php?message=4');
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
	if($checker==0){
	header('location:menu.php?message=3');
	}
}

if(isset($_POST['editDishTypeBtn'])){
	$menuTypeID = $_POST['editDishTypeID'];
	$menuTypeName = $_POST['editDishTypeName'];
	$menuTypeDesc = ($_POST['editDishTypeDesc']);
	$menuTypeStatus = 1;
	$image = $_FILES['dishTypeImage']['name'];
	$tempName = $_POST['tempName'];
	$maxsize    = 2097152;
	$acceptable = array(
	'image/jpeg',
	'image/jpg',
	'image/gif',
	'image/png'
	);
	$checker = 0;


	if($tempName==$menuTypeName){
	$checker = 1;
	}
	else{

	$query = "SELECT dishTypeName FROM coursetypetbl WHERE dishTypeName = '$menuTypeName' and dishTypeStatus=1";
	$result = $connect->query($query);

	if(mysqli_num_rows($result)==0)
	{
	$checker = 1;
	}
	else{
	$checker = 0;
	}	
	}

	if($checker==1){

	if($image==""){
	$defaultImage = 'location.jpg';
	$edit = "UPDATE coursetypetbl SET dishTypeName = '$menuTypeName', dishTypeDescription = '$menuTypeDesc', dishTypeImage = '$defaultImage' where dishTypeID = '$menuTypeID'";
	$execute = mysqli_query($connect, $edit); 
	if($execute){
	header('location:menu_type.php?message=4');
	}
	}
	else{
	if($_FILES['dishTypeImage']['size'] < $maxsize) {
	if(in_array($_FILES['dishTypeImage']['type'], $acceptable)) {

	$target = "images/".basename($_FILES['dishTypeImage']['name']);
	$edit = "UPDATE coursetypetbl SET dishTypeName = '$menuTypeName', dishTypeDescription = '$menuTypeDesc', dishTypeImage = '$image' where dishTypeID = '$menuTypeID'";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
	if (move_uploaded_file($_FILES['dishTypeImage']['tmp_name'], $target)){
	header('location:menu_type.php?message=4');
	}
	}
	}
	else{
	header('location:menu_type.php?message=7');
	}
	}
	else{
	header('location:menu_type.php?message=4');
	}
	}
	}
	if($checker==0){
	header('location:menu_type.php?message=9');
	}
}

if(isset($_POST['editEmployeeBtn'])){
	$employeeID = $_POST['editEmployeeID'];
	$employeeName = $_POST['editEmployeeName'];
	$employeeType = $_POST['editEmployeeType'];
	$employeeStatus = 1;
	$tempName = $_POST['tempName'];

	$maxsize = 2097152;
	$acceptable = array(
	'image/jpeg',
	'image/jpg',
	'image/gif',
	'image/png'
	);


	$image = $_FILES['editEmployeeImage']['name'];


	$checker = 0;


	if($tempName==$employeeName){
	$checker = 1;
	}
	else{

	$query = "SELECT employeeName FROM employeetbl WHERE employeeName = '$employeeName' and employeeStatus=1";
	$result = $connect->query($query);

	if(mysqli_num_rows($result)==0)
	{
	$checker = 1;
	}
	else{
	$checker = 0;
	}	
	}

	if($checker==1){

	if($image==""){
	$defaultImage = 'logo.png';
	$edit = "UPDATE employeetbl SET employeeName ='$employeeName', employeeTypeID = $employeeType, employeeImage = '$defaultImage' where employeeID = $employeeID";
	$execute = mysqli_query($connect, $edit);
	if($execute){
	header('location:employee.php?message=4');
	}
	}
	else{
	if(($_FILES['editEmployeeImage']['size'] < $maxsize)) {
	if(in_array($_FILES['editEmployeeImage']['type'], $acceptable)){
	$target = "images/".basename($_FILES['editEmployeeImage']['name']);
	$edit = "UPDATE employeetbl SET employeeName ='$employeeName', employeeTypeID = $employeeType, employeeImage = '$image' where employeeID = $employeeID";
	$execute = mysqli_query($connect, $edit);
	if($execute){
	if (move_uploaded_file($_FILES['editEmployeeImage']['tmp_name'], $target)){
	header('location:employee.php?message=4');
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
	if($checker==0){
	header('location:employee.php?message=9');
	}
}

if(isset($_POST['editEmployeeTypeBtn'])){
	$employeeTypeID = $_POST['editEmployeeTypeID'];
	$employeeTypeName = $_POST['editEmployeeTypeName'];
	$employeeRatePerHour = ($_POST['editEmployeeRatePerHour']);
	$employeeTypeStatus = 1;
	$tempName = $_POST['tempName'];
	$checker = 0;


	if($tempName==$employeeTypeName){
	$checker = 1;
	}
	else{

	$query = "SELECT employeeTypeName FROM employeetypetbl WHERE employeeTypeName = '$employeeTypeName' and employeeTypeStatus=1";
	$result = $connect->query($query);

	if(mysqli_num_rows($result)==0)
	{
	$checker = 1;
	}
	else{
	$checker = 0;
	}	
	}

	if($checker==1){

	$edit = "UPDATE employeetypetbl SET employeeTypeName = '$employeeTypeName', employeeRatePerHour = '$employeeRatePerHour' where employeeTypeID = '$employeeTypeID'";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
	header('location:employee_type.php?message=4');                 
	}
	}
	if($checker==0){
	header('location:employee_type.php?message=9');
	}
}

if(isset($_POST['editEquipmentBtn'])){
	$editEquipmentID = $_POST['editEquipmentID'];
	$editEquipmentName = $_POST['editEquipmentName'];
	$editEquipmentDescription = $_POST['editEquipmentDescription'];
	$editEquipmentRatePerHour = $_POST['editEquipmentRatePerHour'];
	$editEquipmentUnit = $_POST['editEquipmentUnit'];
	$tempName = $_POST['tempName'];
	$maxsize = 2097152;
	$acceptable = array(
	'image/jpeg',
	'image/jpg',
	'image/gif',
	'image/png'
	);
	$image = $_FILES['editEquipmentImage']['name'];
	$checker = 0;


	if($tempName==$editEquipmentName){
	$checker = 1;
	}
	else{

	$query = "SELECT equipmentName FROM equipmenttbl WHERE equipmentName = '$editEquipmentName' and equipmentStatus=1";
	$result = $connect->query($query);

	if(mysqli_num_rows($result)==0)
	{
	$checker = 1;
	}
	else{
	$checker = 0;
	}	
	}

	if($checker==1){
	if($image==""){
	$defaultImage = 'location.jpg';
	$edit = "UPDATE equipmenttbl SET equipmentName ='$editEquipmentName', equipmentDescription = '$editEquipmentDescription', equipmentRatePerHour = $editEquipmentRatePerHour, equipmentUnit = $editEquipmentUnit, equipmentImage = '$defaultImage' where equipmentID = $editEquipmentID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
	header('location:equipment.php?message=4');
	}
	}
	else{
	if(($_FILES['editEquipmentImage']['size'] < $maxsize)) {
	if(in_array($_FILES['editEquipmentImage']['type'], $acceptable)){
	$target = "images/".basename($_FILES['editEquipmentImage']['name']);
	$edit = "UPDATE equipmenttbl SET equipmentName ='$editEquipmentName', equipmentDescription = '$editEquipmentDescription', equipmentRatePerHour = $editEquipmentRatePerHour, equipmentUnit = $editEquipmentUnit, equipmentImage = '$image' where equipmentID = $editEquipmentID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
	if (move_uploaded_file($_FILES['editEquipmentImage']['tmp_name'], $target)){
	header('location:equipment.php?message=4');
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
	if($checker==0){
	header('location:equipment.php?message=9');
	}
}

if(isset($_POST['editEventBtn'])){
	$eventTypeID = $_POST['editEventTypeID'];
	$eventTypeName = $_POST['editEventTypeName'];
	$eventTypeDescription = ($_POST['editEventTypeDesc']);
	$tempName = $_POST['tempName'];
	$checker = 0;


	if($tempName==$eventTypeName){
	$checker = 1;
	}
	else{

	$query = "SELECT eventTypeName FROM eventtypetbl WHERE eventTypeName = '$eventTypeName' and eventTypeStatus=1";
	$result = $connect->query($query);

	if(mysqli_num_rows($result)==0)
	{
	$checker = 1;
	}
	else{
	$checker = 0;
	}	
	}

	if($checker==1){

	$update = "UPDATE eventtypetbl SET eventTypeName = '$eventTypeName', eventTypeDescription = '$eventTypeDescription' where eventTypeID = $eventTypeID";
	$execute = mysqli_query($connect, $update);    
	if($execute){
	header('location:event.php?message=4');                
	}
	}
	if($checker==0){
	header('location:event.php?message=9');  
	}
}

if(isset($_POST['editLocationBtn'])){
	$locationID = $_POST['editLocationID'];
	$locationName = $_POST['editLocationName'];
	$locationPrice = $_POST['editLocationPrice'];
	$locationDesc = $_POST['editLocationDesc'];
	$locationAddress = $_POST['editLocationAdd'];
	$locationContactPerson = $_POST['editLocationContactPerson'];
	$locationContactNumber = $_POST['editLocationContactNumber'];
	$locationCapacity = $_POST['editLocationCapacity'];
	$locationStatus = 1;
	$locationAvailability = 1;
	$tempName = $_POST['tempName'];
	$checker = 0;
	$image = $_FILES['editLocationImage']['name'];
	$maxsize    = 2097152;
	$acceptable = array(
	'image/jpeg',
	'image/jpg',
	'image/gif',
	'image/png'
	);



	if($tempName==$locationName){
	$checker = 1;
	}
	else{

	$query = "SELECT locationName FROM locationtbl WHERE locationName = '$locationName' and locationStatus=1";
	$result = $connect->query($query);

	if(mysqli_num_rows($result)==0)
	{
	$checker = 1;
	}
	else{
	$checker = 0;
	}	
	}

	if($checker==1){
	if ($image==""){

	$locationImage = 'location.jpg';
	$update = "UPDATE locationtbl SET locationName = '$locationName', locationContactPerson = '$locationContactPerson', locationContactNumber = '$locationContactNumber', locationDescription = '$locationDesc', locationCapacity = '$locationCapacity', locationFee = '$locationPrice', locationAddress = '$locationAddress', locationAvailability = '$locationAvailability', locationStatus = '$locationStatus', imageName = '$locationImage' where locationID = $locationID";
	$execute = mysqli_query($connect, $update);
	if($execute){
	header('location:location.php?message=4');
	}
	}
	else{
	if($_FILES['editLocationImage']['size'] < $maxsize) {
	if(in_array($_FILES['editLocationImage']['type'], $acceptable)) {
	$target = "images/".basename($_FILES['editLocationImage']['name']);
	$update = "UPDATE locationtbl SET locationName = '$locationName', locationContactPerson = '$locationContactPerson', locationContactNumber = '$locationContactNumber', locationDescription = '$locationDesc', locationCapacity = '$locationCapacity', locationFee = '$locationPrice', locationAddress = '$locationAddress', locationAvailability = '$locationAvailability', locationStatus = '$locationStatus', imageName = '$image' where locationID = $locationID";
	$execute = mysqli_query($connect, $update);
	if($execute){
	if (move_uploaded_file($_FILES['editLocationImage']['tmp_name'], $target)){
	header('location:location.php?message=4');				
	}
	}
	}
	else{
	header('location:location.php?message=7');
	}
	}
	else{
	header('location:location.php?message=8');
	}
	}
	}
	if($checker==0){
	header('location:location.php?message=9'); 
	}
}

if(isset($_POST['editPackageBtn'])){
	$packageID = $_POST['editPackageID'];
	$packageName = $_POST['editPackageName'];
	$packagePrice = $_POST['editPackagePrice'];
	$packageDesc = $_POST['editPackageDesc'];
	$packageInclusion = implode(', ', $_POST['editPackageInclusion']);
	$packageStatus = 1;
	$tempName = $_POST['tempName'];

	$checker = 0;
	$image = $_FILES['editPackageImage']['name'];
	$maxsize    = 2097152;
	$acceptable = array(
	'image/jpeg',
	'image/jpg',
	'image/gif',
	'image/png'
	);

	if($tempName==$packageName){
	$checker = 1;
	}
	else{

	$query = "SELECT packageName FROM packagetbl WHERE packageName = '$packageName' and packageStatus=1";
	$result = $connect->query($query);

	if(mysqli_num_rows($result)==0)
	{
	$checker = 1;
	}
	else{
	$checker = 0;
	}	
	}

	if($checker==1){
	if ($image==""){

	$packageImage = 'location.jpg';
	$edit = "UPDATE packagetbl SET packageName ='$packageName', packageDescription = '$packageDesc', packageCost = $packagePrice, packageInclusion = '$packageInclusion' where packageID = $packageID";
	$execute = mysqli_query($connect, $edit);
	if($execute){   
	header('location:package.php?message=4');
	}
	}
	else{
	if($_FILES['editPackageImage']['size'] < $maxsize) {
	if(in_array($_FILES['editPackageImage']['type'], $acceptable)) {
	$target = "images/".basename($_FILES['editPackageImage']['name']);
	$edit = "UPDATE packagetbl SET packageName ='$packageName', packageDescription = '$packageDesc', packageCost = $packagePrice, packageInclusion = '$packageInclusion', imageName = '$image' where packageID = $packageID";
	$execute = mysqli_query($connect, $edit);
	if($execute){
	if (move_uploaded_file($_FILES['editPackageImage']['tmp_name'], $target)){
	header('location:package.php?message=4');				
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
	if($checker==0){
	header('location:package.php?message=9');
	}
}

if(isset($_POST['editServiceBtn'])){
	$serviceID = $_POST['editServiceID'];
	$serviceName = $_POST['editServiceName'];
	$serviceFee = $_POST['editServiceFee'];
	$serviceDescription = ($_POST['editServiceDesc']);
	$serviceStatus = 1;
	$tempName = $_POST['tempName'];
	$checker = 0;


	if($tempName==$serviceName){
	$checker = 1;
	}
	else{

	$query = "SELECT serviceName FROM servicetbl WHERE serviceName = '$serviceName' and serviceStatus=1";
	$result = $connect->query($query);

	if(mysqli_num_rows($result)==0)
	{
	$checker = 1;
	}
	else{
	$checker = 0;
	}	
	}

	if($checker==1){

	$edit = "UPDATE servicetbl SET serviceName ='$serviceName', serviceDescription = '$serviceDescription', serviceFee = $serviceFee  where serviceID = $serviceID";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
	header('location:service.php?message=4');                       
	}
	}
	if($checker==0){
	header('location:service.php?message=9');  
	}
}

if(isset($_POST['editServiceTypeBtn'])){
	$serviceTypeID = $_POST['editServiceTypeID'];
	$serviceTypeName = $_POST['editServiceTypeName'];
	$serviceTypeDescription = ($_POST['editServiceTypeDesc']);
	$serviceTypeStatus = 1;
	$edit = "UPDATE servicetypetbl SET serviceTypeName = '$serviceTypeName', serviceTypeDescription = '$serviceTypeDescription' where serviceTypeID = '$serviceTypeID'";
	$execute = mysqli_query($connect, $edit);    
	if($execute){
			header('location:service_type.php?message=4');               
	}
}


?>