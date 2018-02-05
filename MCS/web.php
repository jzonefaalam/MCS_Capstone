<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sendEmail', 'mailController@send');


Route::get('/Login', function () {
    return view('Login');
});
Route::post("/doLogin", array("uses"=>"adminController@authenticateLogin"));

//REPORTS PAGE
Route::get('/ReportPage', 'adminController@reportPage');
Route::get('/RetrieveMonthlyTransaction', 'adminController@retrieveMonthlyTransaction');
Route::get('/RetrieveYearlyTransaction', 'adminController@retrieveYearlyTransaction');
Route::get('/RetrieveAllTransaction', 'adminController@retrieveAllTransaction');

Route::post("/ApproveReservationEmail", array("uses"=>"adminController@sendApprovalEmail"));
Route::post("/DenyReservationEmail", array("uses"=>"adminController@sendDenyEmail"));
// Route::post('/ReservationEmail', 'adminController@sendEmail');

Route::get('/Logout', 'adminController@authenticateLogout');

//DishPage
Route::get('/DishPage', 'adminController@dishPage');
Route::get('/RetrieveDish', 'adminController@retrieveDishData');
Route::post("/DishPage", array("uses"=>"adminController@addDishes"));
Route::post("/EditDishPage", array("uses"=>"adminController@editDish"));
Route::post("/DeleteDishPage", array("uses"=>"adminController@deleteDish"));

//DishTypePage
Route::get('/DishTypePage', 'adminController@dishTypePage');
Route::get('/RetrieveDishType', 'adminController@retrieveDishTypeData');
Route::post("/DishTypePage", array("uses"=>"adminController@addDishType"));
Route::post("/EditDishTypePage", array("uses"=>"adminController@editDishType"));
Route::post("/DeleteDishTypePage", array("uses"=>"adminController@deleteDishType"));
Route::post("/DishTypeValidator", array("uses"=>"adminController@validateDishTypeName"));
// Route::get('/DishTypeValidator', 'adminController@validateDishTypeName');

//EmployeePage
Route::get('/EmployeePage', 'adminController@employeePage');
Route::post("/EmployeePage", array("uses"=>"adminController@addEmployee"));
Route::get('/RetrieveEmployee', 'adminController@retrieveEmployeeData');
Route::post("/EditEmployeePage", array("uses"=>"adminController@editEmployee"));
Route::post("/DeleteEmployeePage", array("uses"=>"adminController@deleteEmployee"));

//EmployeeTypePage
Route::get('/EmployeeTypePage', 'adminController@employeeTypePage');
Route::post("/EmployeeTypePage", array("uses"=>"adminController@addEmployeeType"));
Route::post("/EditEmployeeTypePage", array("uses"=>"adminController@editEmployeeType"));
Route::get('/RetrieveEmployeeTypePage', 'adminController@retrieveEmployeeTypeData');
Route::post("/DeleteEmployeeTypePage", array("uses"=>"adminController@deleteEmployeeType"));

//EventPage
Route::get('/EventPage', 'adminController@eventPage');
Route::post("/EventPage", array("uses"=>"adminController@addEvent"));
Route::post("/EditEventPage", array("uses"=>"adminController@editEvent"));
Route::get('/RetrieveEvent', 'adminController@retrieveEventData');
Route::post("/DeleteEventPage", array("uses"=>"adminController@deleteEvent"));

//EquipmentPage
Route::get('/EquipmentPage', 'adminController@equipmentPage');
Route::post("/EquipmentPage", array("uses"=>"adminController@addEquipment"));
Route::post("/EditEquipmentPage", array("uses"=>"adminController@editEquipment"));
Route::get('/RetrieveEquipment', 'adminController@retrieveEquipmentData');
Route::post("/DeleteEquipmentPage", array("uses"=>"adminController@deleteEquipment"));

//EquipmentTypePage
Route::get('/EquipmentTypePage', 'adminController@equipmentTypePage');
Route::post("/EquipmentTypePage", array("uses"=>"adminController@addEquipmentType"));
Route::post("/EditEquipmentTypePage", array("uses"=>"adminController@editEquipmentType"));
Route::get('/RetrieveEquipmentType', 'adminController@retrieveEquipmentTypeData');
Route::post("/DeleteEquipmentTypePage", array("uses"=>"adminController@deleteEquipmentType"));

//PackagePage
Route::get('/PackagePage', 'adminController@packagePage');
Route::post("/PackagePage", array("uses"=>"adminController@addPackage"));
Route::post("/EditPackagePage", array("uses"=>"adminController@editPackage"));
Route::get('/RetrievePackage', 'adminController@retrievePackageData');
Route::get('/RetrievePackageInclusion', 'adminController@retrievePackageInclusion');
Route::post("/DeletePackagePage", array("uses"=>"adminController@deletePackage"));

//LocationPage
Route::get('/LocationPage', 'adminController@locationPage');
Route::post("/LocationPage", array("uses"=>"adminController@addLocation"));
Route::post("/EditLocationPage", array("uses"=>"adminController@editLocation"));
Route::get('/RetrieveLocation', 'adminController@retrieveLocationData');
Route::post("/DeleteLocationPage", array("uses"=>"adminController@deleteLocation"));

//ServicePage
Route::get('/ServicePage', 'adminController@servicePage');
Route::post("/ServicePage", array("uses"=>"adminController@addService"));
Route::post("/EditServicePage", array("uses"=>"adminController@editService"));
Route::get('/RetrieveService', 'adminController@retrieveServiceData');
Route::post("/DeleteServicePage", array("uses"=>"adminController@deleteService"));

//serviceTypeTypePage
Route::get('/ServiceTypePage', 'adminController@serviceTypePage');
Route::post("/ServiceTypePage", array("uses"=>"adminController@addServiceType"));
Route::post("/EditServiceTypePage", array("uses"=>"adminController@EditServiceType"));
Route::get('/RetrieveServiceType', 'adminController@retrieveServiceTypeData');
Route::post("/DeleteServiceTypePage", array("uses"=>"adminController@deleteServiceType"));

//DashboardPage
Route::get('/DashboardPage', 'adminController@dashboardPage');
Route::get('/RetrieveSchedule', 'adminController@retrieveScheduleData');

//Reservation Page
Route::get('/ReservationPage', 'adminController@reservationPage');
Route::get('/RetrieveReservation', 'adminController@retrieveReservationData');
Route::get('/RetrieveReservationID', 'adminController@retrieveReservationId');
Route::post("/EditReservation", array("uses"=>"adminController@editReservation"));

//Inventory Equipment Page
Route::get('/InventoryEquipmentPage', 'adminController@inventoryEquipmentPage');
Route::post("/EnableEquipment", array("uses"=>"adminController@enableEquipment"));
Route::post("/DisableEquipment", array("uses"=>"adminController@disableEquipment"));
Route::post("/UpdateEquipmentUnit", array("uses"=>"adminController@addEquipmentUnit"));

//Purchase Order Page
Route::get('/InventoryPOPage', 'adminController@inventoryPOPage');
Route::post("/InventoryPOPage", array("uses"=>"adminController@addPO"));

//Purchase Order Type Page
Route::get('/InventoryPOTypePage', 'adminController@inventoryPOTypePage');
Route::post("/InventoryPOTypePage", array("uses"=>"adminController@addPOType"));
Route::get('/RetrievePOTypeData', 'adminController@retrievePOTypeData');
Route::post("/EditPOType", array("uses"=>"adminController@editPOType"));
Route::post("/DeletePOType", array("uses"=>"adminController@dseletePOType"));

//Transaction Page
Route::get('/TransactionPage', 'adminController@transactionPage');
Route::get('/RetrieveTransaction', 'adminController@retrieveTransactionData');
Route::get('/AssignEquipment', 'adminController@assignEquipmentData');


///// USER ROUTING /////

Route::get('/UserBasePage', 'userController@basePage');
Route::get('/UserMenuPage', 'userController@menuPage');
Route::get('/UserPackagePage', 'userController@uPackPage');
Route::get('/UserDishPage', 'userController@uDishPage');
Route::get('/UserServicePage', 'userController@uServicePage');
Route::get('/UserReservationPage', 'userController@reservationPage');
Route::post('/UserReservationPage-getPIID', 'userController@getPIID');
Route::post('/UserReservationPage-getPay', 'userController@getPay');
Route::post('/UserReservationPage-getPrice', 'userController@getPrice');
Route::post('/UserReservationPage-getAdd', 'userController@getAdd');
Route::post('/UserReservationPage-getServ', 'userController@getServ');
Route::post('/UserReservationPage-getEquip', 'userController@getEquip');
Route::post('/UserReservationPage-getEmp', 'userController@getEmp');
Route::post('/UserReservationPage-getCus', 'userController@getCus');
Route::post('/UserReservationPage-getReservation', 'userController@getReservation');
Route::post("/UserReservationPage", array("uses"=>"userController@addReservation"));
Route::post("/UserReservationPage-getDish", array("uses"=>"userController@getDish"));
Route::get('/UserReservationPage2', 'userController@reservationPage2');
Route::get('/UserAboutPage', 'userController@aboutPage');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
