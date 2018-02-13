<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Query\Builder;
use Carbon\Carbon;
use App\dish_tbl;
use App\dishtype_tbl;
use App\employeetype_tbl;
use App\employee_tbl;
use App\equipment_tbl;
use App\equipmenttype_tbl;
use App\eventtype_tbl;
use App\location_tbl;
use App\package_tbl;
use App\service_tbl;
use App\servicetype_tbl;
use App\reservation_tbl;
use App\event_tbl;
use App\customer_tbl;
use App\packageinclusion_tbl;
use App\equipmentlog_tbl;
use App\transaction_tbl;
use App\purchaseordertype_tbl;
use App\purchaseorder_tbl;
use App\payment_tbl;
use App\unitmeasurement_tbl;
use App\assignequipment_tbl;
use Mail;
use Session;
class adminController extends Controller
{

    public function sendApprovalEmail(Request $request){

        // Customer
        $getCustomerName = Input::get('mailCustomerName');
        $getCustomerHomeAddress = Input::get('mailCustomerHomeAddress');
        $getCustomerEmailAddress = Input::get('mailCustomerEmailAddress');
        $getCustomerContactNumber = Input::get('mailCustomerContactNumber');
        $getCustomerBirthDate = Input::get('mailCustomerBirthDate');

        // Event
        $getEventName = Input::get('mailEventName');
        $getEventDate = Input::get('mailEventDate');
        $getEventLocation = Input::get('mailEventLocation');
        $getEventGuestCount = Input::get('mailEventGuestCount');
        $getEventStartTime = Input::get('mailEventStartTime');
        $getEventEndTime = Input::get('mailEventEndTime');

        // Others
        $getPackageCost = Input::get('mailPackageCost');
        $getPackageAddOns = Input::get('mailPackageAddOns');
        $getReservationFee = ($getPackageCost *  $getEventGuestCount) + $getPackageAddOns;
        $getReservationID = Input::get('mailReservationID');
        $getCustomerID = Input::get('mailCustomerID');
        $getPaymentTerm = Input::get('mailEventPaymentTerm');
        $getEventID = Input::get('mailEventID');

        // Save to reservation_tbl
        $reservationtbl = reservation_tbl::find($getReservationID);
        $reservationtbl->reservationStatus = 3;
        $reservationtbl->save();

        // Save to event
        $eventtbl = event_tbl::find($getEventID);
        $eventtbl->eventName = $getEventName;
        $eventtbl->eventDate = $getEventDate;
        $eventtbl->eventLocation = $getEventLocation;
        $eventtbl->guestCount= $getEventGuestCount;
        $eventtbl->eventTime= $getEventStartTime;
        $eventtbl->endTime= $getEventEndTime;
        $eventtbl->locationID= null;
        $eventtbl->save();

        // Save to transaction_tbl
        $transactiontbl = new transaction_tbl;
        $transactiontbl->transactionStatus = 1; //Accepted Reservation, Pending for Payment
        $transactiontbl->totalFee = $getReservationFee;
        $transactiontbl->reservationID = $getReservationID;
        $transactiontbl->save();

        //Save to customer_tbl
        $customertbl = customer_tbl::find($getCustomerID);
        $customertbl->fullName = $getCustomerName;
        $customertbl->homeAddress = $getCustomerHomeAddress;
        $customertbl->emailAddress = $getCustomerEmailAddress;
        $customertbl->cellNum = $getCustomerContactNumber;
        $customertbl->dateOfBirth = $getCustomerBirthDate;
        $customertbl->customerStatus = 0;
        $customertbl->save();

        // Save to payment_tbl
        $paymentTerm = $getPaymentTerm;
        if ($paymentTerm == 1) { //Full Payment
            $paymenttbl = new payment_tbl;
            $plusOneWeek = strtotime("+8 day");
            $firstPaymentDate = date('Y-m-d', $plusOneWeek);
            $paymenttbl->paymentDueDate = $firstPaymentDate;
            $paymenttbl->paymentStatus = 0;
            $paymenttbl->reservationID = $getReservationID;
            $paymenttbl->paymentAmount = $getReservationFee;
            $paymenttbl->save();
        }
        if ($paymentTerm == 2) { //Half Payment
            $halfPayment = $getReservationFee / 2;
            $plusOneWeek = strtotime("+8 day");
            $NewDate=Date('y:m:d', strtotime("+8 days"));
            $firstPaymentDate = date('Y-m-d', $plusOneWeek);
            // dd($firstPaymentDate);
            $paymenttbl = new payment_tbl;
            $paymenttbl->paymentDueDate = $getEventDate;
            $paymenttbl->paymentStatus = 0;
            $paymenttbl->reservationID = $getReservationID;
            $paymenttbl->paymentAmount = $halfPayment;
            $paymenttbl->save();

            $paymenttbl2 = new payment_tbl;
            $paymenttbl2->paymentDueDate = $firstPaymentDate;
            $paymenttbl2->paymentStatus = 0;
            $paymenttbl2->reservationID = $getReservationID;
            $paymenttbl2->paymentAmount = $halfPayment;
            $paymenttbl2->save();
        }

        if ($paymentTerm == 3) { //70/30 Payment
            $firstPayment = ($getReservationFee * .7);
            $secondPayment = ($getReservationFee * .3);
            $plusOneWeek = strtotime("+8 day");
            $NewDate=Date('y:m:d', strtotime("+8 days"));
            $firstPaymentDate = date('Y-m-d', $plusOneWeek);
            // dd($firstPaymentDate);
            $paymenttbl = new payment_tbl;
            $paymenttbl->paymentDueDate = $getEventDate;
            $paymenttbl->paymentStatus = 0;
            $paymenttbl->reservationID = $getReservationID;
            $paymenttbl->paymentAmount = $secondPayment;
            $paymenttbl->save();

            $paymenttbl2 = new payment_tbl;
            $paymenttbl2->paymentDueDate = $firstPaymentDate;
            $paymenttbl2->paymentStatus = 0;
            $paymenttbl2->reservationID = $getReservationID;
            $paymenttbl2->paymentAmount = $firstPayment;
            $paymenttbl2->save();
        }

        $mailEventLocation = Input::get('mailEventLocation');
        $mailPackageAvailed = Input::get('mailPackageAvailed');
        $mailPaymentTerm = Input::get('mailPaymentTerm');
        $mailEventDate = Input::get('mailEventDate');
        $mailEventName = Input::get('mailEventName');
        $mailEventStartTime = Input::get('mailEventStartTime');
        $mailEventEndTime = Input::get('mailEventEndTime');
        $mailDishInclusion = Input::get('mailDishInclusion');
        $mailDishAdditional = Input::get('mailDishAdditional');
        $mailServiceAdditional = Input::get('mailServiceAdditional');
        $mailEmployeeAdditional = Input::get('mailEmployeeAdditional');
        $mailEquipmentAdditional = Input::get('mailEquipmentAdditional');
        $mailNumOfGuest = Input::get('mailNumOfGuest');
        $mailCustomerName = Input::get('mailCustomerName');
        $currentMonth = date('m');
        $currentDay = date('d');
        $currentYear = date('Y');
        $data = array(
         'mailEventLocation' => $mailEventLocation,
         'mailPackageAvailed' => $mailPackageAvailed,
         'currentMonth' => $currentMonth,
         'currentDay' => $currentDay, 
         'currentYear' => $currentYear,
         'mailPaymentTerm' => $mailPaymentTerm,
         'mailEventDate' => $mailEventDate,
         'mailEventStartTime' => $mailEventStartTime, 
         'mailEventEndTime' => $mailEventEndTime,
         'mailDishInclusion' => $mailDishInclusion,
         'mailDishAdditional' => $mailDishAdditional,
         'mailServiceAdditional' => $mailServiceAdditional,
         'mailEmployeeAdditional' => $mailEmployeeAdditional, 
         'mailEquipmentAdditional' => $mailEquipmentAdditional,
         'mailNumOfGuest' => $mailNumOfGuest,
         'mailEventName' => $mailEventName,
         'mailCustomerName' => $mailCustomerName
        );
        // Mail::send('mail', $data, function($message) use ($data){$message->to("mcssystem2017@gmail.com",'Products')->subject('Receipt');
        // });
        return redirect()->back();  
    }

    public function sendDenyEmail(Request $request){
        // $data = array(
        //     'email' => "jsooooon017@gmail.com",
        //     'subject' => "Test Approval",
        //     'bodyMessage' => 'Sample'
        //     );
        // Mail::send('emails.approval', $data, function($message) use ($data){
        //     $message->from($data['email']);
        //     $message->to('jzone_faalam@yahoo.com');
        //     $message->subject($data['subject']);
        // });
        $id = Input::get('denyReservationId');
        $reservationtbl = reservation_tbl::find($id);
        $reservationtbl->reservationStatus = 2;
        $reservationtbl->save();


        $transactiontbl = new transaction_tbl;
        $transactiontbl->transactionStatus = 6; //Denied
        $transactiontbl->totalFee = 0;
        $transactiontbl->reservationID = $id;
        $transactiontbl->save();
        return redirect()->back();
    }

    public function saveReservation(Request $request){
       
        return redirect()->back();
    }

    public function authenticateLogin(){
        $usernameLogin = Input::get('usernameLogin');
        $passwordLogin = Input::get('passwordLogin');
        $loginData = DB::table('users')
        ->select('*')
        ->where('username',$usernameLogin)
        ->where('password',$passwordLogin)
        ->count();
        if($loginData>0){
            return redirect()->action('adminController@dishPage');
        }
    }

    public function authenticateLogout(){
        return View::make('/Login');
    }

    //Reports Page functions-------------------------------------------------------------------------->
    public function reportPage(){
        return View::make('/ReportPage');
    }

    public function retrieveMonthlyCollection(){
        $currentMonth = date('m');
        $currentYear = date('Y');
        $stmt = "SELECT package_tbl.`packageName`, customer_tbl.`fullName`, event_tbl.`guestCount`, event_tbl.`eventDate`, event_tbl.`eventName`, transaction_tbl.`totalFee`, SUM(payment_tbl.`paymentAmount`) as paid FROM payment_tbl, customer_tbl, event_tbl, transaction_tbl, reservation_tbl, package_tbl WHERE payment_tbl.`reservationID` = reservation_tbl.`reservationID` AND reservation_tbl.`eventID` = event_tbl.`eventID` AND event_tbl.`customerID` = customer_tbl.`customerID` AND transaction_tbl.`reservationID` = reservation_tbl.`reservationID` AND YEAR(event_tbl.`eventDate`) = '$currentYear' and month(event_tbl.`eventDate`) = '$currentMonth' AND package_tbl.`packageID` = reservation_tbl.`packageID` GROUP BY package_tbl.`packageName`, customer_tbl.`fullName`, event_tbl.`guestCount`, event_tbl.`eventDate`, event_tbl.`eventName`, transaction_tbl.`totalFee`";
        $paymentData = DB::select($stmt);
        return \Response::json(['paymentData'=>$paymentData]);
    }

    public function retrieveYearlyCollection(){
        $currentMonth = date('m');
        $currentYear = date('Y');
        $stmt = "SELECT package_tbl.`packageName`, customer_tbl.`fullName`, event_tbl.`guestCount`, event_tbl.`eventDate`, event_tbl.`eventName`, transaction_tbl.`totalFee`, SUM(payment_tbl.`paymentAmount`) as paid FROM payment_tbl, customer_tbl, event_tbl, transaction_tbl, reservation_tbl, package_tbl WHERE payment_tbl.`reservationID` = reservation_tbl.`reservationID` AND reservation_tbl.`eventID` = event_tbl.`eventID` AND event_tbl.`customerID` = customer_tbl.`customerID` AND transaction_tbl.`reservationID` = reservation_tbl.`reservationID` AND YEAR(event_tbl.`eventDate`) = '$currentYear' AND package_tbl.`packageID` = reservation_tbl.`packageID` GROUP BY package_tbl.`packageName`, customer_tbl.`fullName`, event_tbl.`guestCount`, event_tbl.`eventDate`, event_tbl.`eventName`, transaction_tbl.`totalFee`";
        $paymentData = DB::select($stmt);
        return \Response::json(['paymentData'=>$paymentData]);
    }

    public function retrieveAllCollection(){
        $currentMonth = date('m');
        $currentYear = date('Y');
        $stmt = "SELECT package_tbl.`packageName`, customer_tbl.`fullName`, event_tbl.`guestCount`, event_tbl.`eventDate`, event_tbl.`eventName`, transaction_tbl.`totalFee`, SUM(payment_tbl.`paymentAmount`) as paid FROM payment_tbl, customer_tbl, event_tbl, transaction_tbl, reservation_tbl, package_tbl WHERE payment_tbl.`reservationID` = reservation_tbl.`reservationID` AND reservation_tbl.`eventID` = event_tbl.`eventID` AND event_tbl.`customerID` = customer_tbl.`customerID` AND transaction_tbl.`reservationID` = reservation_tbl.`reservationID` AND package_tbl.`packageID` = reservation_tbl.`packageID`  GROUP BY package_tbl.`packageName`, customer_tbl.`fullName`, event_tbl.`guestCount`, event_tbl.`eventDate`, event_tbl.`eventName`, transaction_tbl.`totalFee`";
        $paymentData = DB::select($stmt);
        return \Response::json(['paymentData'=>$paymentData]);
    }

    public function retrieveMonthlyTransaction(){
        $currentMonth = date('m');
        $currentYear = date('Y');
        $transactionData =  DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl','customer_tbl.customerID','=','event_tbl.customerID')
        ->join('package_tbl','package_tbl.packageID','=','reservation_tbl.packageID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','customer_tbl.*', 'package_tbl.*')
        ->whereMonth('event_tbl.eventDate', $currentMonth)
        ->whereYear('event_tbl.eventDate',$currentYear)
        ->get();  
        return \Response::json(['transactionData'=>$transactionData]);
    }

    public function retrieveYearlyTransaction(){
        $currentYear= date('Y');
        $transactionData =  DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl','customer_tbl.customerID','=','event_tbl.customerID')
        ->join('package_tbl','package_tbl.packageID','=','reservation_tbl.packageID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','customer_tbl.*', 'package_tbl.*')
        // ->where('transaction_tbl.transactionStatus', 4)
        ->whereYear('event_tbl.eventDate',$currentYear)
        ->get();   
        return \Response::json(['transactionData'=>$transactionData]);
    }

     public function retrieveAllTransaction(){
        $transactionData =  DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl','customer_tbl.customerID','=','event_tbl.customerID')
        ->join('package_tbl','package_tbl.packageID','=','reservation_tbl.packageID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','customer_tbl.*', 'package_tbl.*')
        // ->where('transaction_tbl.transactionStatus', 4)
        ->get();  
        return \Response::json(['transactionData'=>$transactionData]);
    }

    public function retrieveMonthlyPO(){
        $currentMonth = date('m');
        $currentYear = date('Y');
        $poData =  DB::table('purchaseorder_tbl')
        ->join('purchaseordertype_tbl','purchaseordertype_tbl.poTypeId','=','purchaseorder_tbl.poTypeId')
        ->join('unitmeasurement_tbl','unitmeasurement_tbl.uomID','=','purchaseorder_tbl.uomID')
        ->select('purchaseorder_tbl.*', 'purchaseordertype_tbl.*','unitmeasurement_tbl.*')
        ->whereMonth('purchaseorder_tbl.poDate', $currentMonth)
        ->whereYear('purchaseorder_tbl.poDate',$currentYear)
        ->get();  
        return \Response::json(['poData'=>$poData]);
    }

    public function retrieveYearlyPO(){
        $currentMonth = date('m');
        $currentYear = date('Y');
        $poData =  DB::table('purchaseorder_tbl')
        ->join('purchaseordertype_tbl','purchaseordertype_tbl.poTypeId','=','purchaseorder_tbl.poTypeId')
        ->join('unitmeasurement_tbl','unitmeasurement_tbl.uomID','=','purchaseorder_tbl.uomID')
        ->select('purchaseorder_tbl.*', 'purchaseordertype_tbl.*','unitmeasurement_tbl.*')
        ->whereYear('purchaseorder_tbl.poDate',$currentYear)
        ->get();  
        return \Response::json(['poData'=>$poData]);
    }

    public function retrieveAllPO(){
        $currentMonth = date('m');
        $currentYear = date('Y');
        $poData =  DB::table('purchaseorder_tbl')
        ->join('purchaseordertype_tbl','purchaseordertype_tbl.poTypeId','=','purchaseorder_tbl.poTypeId')
        ->join('unitmeasurement_tbl','unitmeasurement_tbl.uomID','=','purchaseorder_tbl.uomID')
        ->select('purchaseorder_tbl.*', 'purchaseordertype_tbl.*','unitmeasurement_tbl.*')
        ->get();  
        return \Response::json(['poData'=>$poData]);
    }

    //Dish Page functions-------------------------------------------------------------------------->
    public function dishPage(){
        $dishData = DB::table('dish_tbl')->join('dishtype_tbl','dishtype_tbl.dishTypeID','=','dish_tbl.dishTypeID')
        ->select('*')
        ->where('dish_tbl.dishStatus', 1)
        ->where('dishtype_tbl.dishTypeStatus', 1)
        ->get();

        $addDishData = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeStatus', 1)
        ->get();

        $dishDataID = DB::table('dish_tbl')->max('dishID');
         
        $dishNewID = $dishDataID + 1;
        return View::make('/DishPage')->with('dishData', $dishData)->with('addDishData', $addDishData)->with('dishNewID', $dishNewID);
    }

    public function retrieveDishData(){
        $ss = DB::table('dish_tbl')
        ->join('dishtype_tbl','dish_tbl.dishTypeID','=','dishtype_tbl.dishTypeID')
        ->select('dish_tbl.*','dishtype_tbl.*')
        ->where('dish_tbl.dishID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function addDishes(Request $request) 
    {
        $dishImage = ($_FILES["addDishImage"]["name"]);

        if($dishImage==null){
            $coursetbl = new dish_tbl;
            $coursetbl->dishName = Input::get('addDishName');
            $coursetbl->dishDescription = Input::get('addDishDesc');
            $coursetbl->dishCost = Input::get('addDishPrice');
            $coursetbl->dishTypeID = Input::get('addDishType');
            $coursetbl->dishAvailability = 1;
            $coursetbl->dishStatus = 1;
            $coursetbl->dishImage = "No image";
            $coursetbl->save();

            Session::flash('title', 'Error!');
            Session::flash('message', 'Please complete the information.');
            Session::flash('type', 'error');

            return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["addDishImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["addDishImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $coursetbl = new dish_tbl;
            $coursetbl->dishName = Input::get('addDishName');
            $coursetbl->dishDescription = Input::get('addDishDesc');
            $coursetbl->dishCost = Input::get('addDishPrice');
            $coursetbl->dishTypeID = Input::get('addDishType');
            $coursetbl->dishAvailability = 1;
            $coursetbl->dishStatus = 1;
            $coursetbl->dishImage = $dishImage;
            $coursetbl->save();

            Session::flash('title', 'Saved!');
            Session::flash('message', 'Dish added succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        }
        // Check file size
        if ($_FILES["addDishImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["addDishImage"]["tmp_name"], $target_file)) {
        $coursetbl = new dish_tbl;
        $coursetbl->dishName = Input::get('addDishName');
        $coursetbl->dishDescription = Input::get('addDishDesc');
        $coursetbl->dishCost = Input::get('addDishPrice');
        $coursetbl->dishTypeID = Input::get('addDishType');
        $coursetbl->dishAvailability = 1;
        $coursetbl->dishStatus = 1;
        $coursetbl->dishImage = $dishImage;
        $coursetbl->save();

        Session::flash('title', 'Saved!');
        Session::flash('message', 'Dish added succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
       
    }

    public function editDish(){
        $dishImage = ($_FILES["editDishImage"]["name"]);

        if($dishImage==null){
        $id = Input::get('editDishID');
        $coursetbl = dish_tbl::find($id);
        $coursetbl->dishName= Input::get('editDishName');
        $coursetbl->dishDescription= Input::get('editDishDesc');
        $coursetbl->dishCost= Input::get('editDishPrice');
        $coursetbl->dishTypeID= Input::get('editDishType');
        $coursetbl->dishImage= "No Image";
        $coursetbl->save();

        Session::flash('title', 'Error!');
        Session::flash('message', 'Please complete the information.');
        Session::flash('type', 'error');

        return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["editDishImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["editDishImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $id = Input::get('editDishID');
            $coursetbl = dish_tbl::find($id);
            $coursetbl->dishName= Input::get('editDishName');
            $coursetbl->dishDescription= Input::get('editDishDesc');
            $coursetbl->dishCost= Input::get('editDishPrice');
            $coursetbl->dishTypeID= Input::get('editDishType');
            $coursetbl->dishImage= $dishImage;
            $coursetbl->save();

            Session::flash('title', 'Updated!');
            Session::flash('message', 'Dish updated succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        }
        // Check file size
        if ($_FILES["editDishImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["editDishImage"]["tmp_name"], $target_file)) {
            $id = Input::get('editDishID');
            $coursetbl = dish_tbl::find($id);
            $coursetbl->dishName= Input::get('editDishName');
            $coursetbl->dishDescription= Input::get('editDishDesc');
            $coursetbl->dishCost= Input::get('editDishPrice');
            $coursetbl->dishTypeID= Input::get('editDishType');
            $coursetbl->dishImage= $dishImage;
            $coursetbl->save();

            Session::flash('title', 'Updated!');
            Session::flash('message', 'Dish updated succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        } else {
            Session::flash('title', 'Error!');
            Session::flash('message', 'Dish not updated.');
            Session::flash('type', 'error');
            return \Redirect::back();
        }
        }
        }
    }

    public function deleteDish(){
        $id = Input::get('deleteDishID');
        $coursetbl=dish_tbl::find($id);
        $coursetbl->dishStatus = 0;
        $coursetbl->save();

        Session::flash('title', 'Deleted!');
        Session::flash('message', 'Dish deleted succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    //Dish Type functions-------------------------------------------------------------------------->

    public function dishTypePage(){
        $dishTypeData = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeStatus', 1)
        ->get();

        
        return View::make('/DishTypePage')->with('dishTypeData', $dishTypeData);
    }

    public function addDishType(Request $request){
        $dishTypeImage = ($_FILES["addDishTypeImage"]["name"]);
        if($dishTypeImage==null){
        $courseType = new dishtype_tbl;
        $courseType->dishTypeName = Input::get('addDishTypeName');
        $courseType->dishTypeStatus = 1;
        $courseType->dishTypeImage = "No Image";
        $courseType->save();
        return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["addDishTypeImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["addDishTypeImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $courseType = new dishtype_tbl;
            $courseType->dishTypeName = Input::get('addDishTypeName');
            $courseType->dishTypeStatus = 1;
            $courseType->dishTypeImage = ($_FILES['addDishTypeImage']['name']);
            $courseType->save();

            Session::flash('title', 'Saved!');
            Session::flash('message', 'Dish type added succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();

        }
        // Check file size
        if ($_FILES["addDishTypeImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["addDishTypeImage"]["tmp_name"], $target_file)) {
            $courseType = new dishtype_tbl;
            $courseType->dishTypeName = Input::get('addDishTypeName');
            $courseType->dishTypeStatus = 1;
            $courseType->dishTypeImage = ($_FILES['addDishTypeImage']['name']);
            $courseType->save();

            Session::flash('title', 'Saved!');
            Session::flash('message', 'Dish type added succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
       
    }

    public function retrieveDishTypeData(){
        $ss = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function editDishType(){
        $dishTypeImage = ($_FILES["editDishTypeImage"]["name"]);

        if($dishTypeImage==null){
        $id = Input::get('editDishTypeID');
        $coursetypetbl = dishtype_tbl::find($id);
        $coursetypetbl->dishTypeName= Input::get('editDishTypeName');
        $coursetypetbl->dishTypeImage = "No Image";
        $coursetypetbl->save();
        return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["editDishTypeImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["editDishTypeImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $id = Input::get('editDishTypeID');
            $coursetypetbl = dishtype_tbl::find($id);
            $coursetypetbl->dishTypeName= Input::get('editDishTypeName');
            $coursetypetbl->dishTypeImage = ($_FILES['editDishTypeImage']['name']);
            $coursetypetbl->save();

            Session::flash('title', 'Updated!');
            Session::flash('message', 'Dish type updated succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        }
        // Check file size
        if ($_FILES["editDishTypeImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["editDishTypeImage"]["tmp_name"], $target_file)) {
        $id = Input::get('editDishTypeID');
        $coursetypetbl = dishtype_tbl::find($id);
        $coursetypetbl->dishTypeName= Input::get('editDishTypeName');
        $coursetypetbl->dishTypeImage = ($_FILES['editDishTypeImage']['name']);
        $coursetypetbl->save();

        Session::flash('title', 'Updated!');
        Session::flash('message', 'Dish type updated succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
        } else {
            Session::flash('title', 'Error!');
            Session::flash('message', 'Dish type not updated.');
            Session::flash('type', 'error');
            return \Redirect::back();
        }
        }
        }
        
    }

    public function deleteDishType(){
        $id = Input::get('deleteDishTypeID');
        $coursetypetbl = dishtype_tbl::find($id);
        $coursetypetbl->dishTypeStatus= 0;
        $coursetypetbl->save();

        Session::flash('title', 'Deleted!');
        Session::flash('message', 'Dish type deleted succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    //Employee functions--------------------------------------------------------------------------->

    public function employeePage(){
        $employeeData = DB::table('employee_tbl')
        ->join('employeetype_tbl','employeetype_tbl.employeeTypeID','=','employee_tbl.employeeTypeID')
        ->select('*')
        ->where('employee_tbl.employeeStatus', 1)
        ->get();

        $addEmployeeData = DB::table('employeetype_tbl')
        ->select('*')
        ->where('employeeTypeStatus', 1)
        ->get();

        return View::make('/EmployeePage')->with('employeeData', $employeeData)->with('addEmployeeData', $addEmployeeData);
    }

    public function addEmployee(Request $request){
        $employeeImage = ($_FILES["addEmployeeImage"]["name"]);
        if($employeeImage==null){
        $employee = new employeetbl;
        $employee->employeeName = Input::get('addEmployeeName');
        $employee->employeeTypeID = Input::get('addEmployeeType');
        $employee->employeeAvailability = 1;
        $employee->employeeStatus = 1;
        $employee->employeeImage = "No Image";
        $employee->save();
        return redirect()->back();
        }
        else{
        $target_dir = "images\\";
        $target_file = $target_dir . basename($_FILES["addEmployeeImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["addEmployeeImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        // if (file_exists($target_file)) {
        //     $id = Input::get('companyId');
        //     $company = MCompanyInfo::find($id);
        //     $company->strCompanyLogo=($_FILES["companylogo"]["name"]);
        //     $company->save();
        //     return \Redirect::back();
        // }
        // Check file size
        if ($_FILES["addEmployeeImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["addEmployeeImage"]["tmp_name"], $target_file)) {
        $employee = new employee_tbl;
        $employee->employeeName = Input::get('addEmployeeName');
        $employee->employeeTypeID = Input::get('addEmployeeType');
        $employee->employeeAvailability = 1;
        $employee->employeeStatus = 1;
        $employee->employeeImage = ($_FILES["addEmployeeImage"]["name"]);
        $employee->save();
        return redirect()->back();

        } else {
            alert('File Not Uploaded!');
            return \Redirect::back();
        }
        }
        }
    }

    public function editEmployee(){
        $id = Input::get('editEmployeeID');
        $employeetbl = employee_tbl::find($id);
        $employeetbl->employeeName= Input::get('editEmployeeName');
        $employeetbl->employeeTypeID= Input::get('editEmployeeType');
        $employeetbl->save();
        return redirect()->back();
    }

    public function retrieveEmployeeData(){
        $ss = DB::table('employee_tbl')
        ->join('employeetype_tbl','employeetype_tbl.employeeTypeID','=','employee_tbl.employeeTypeID')
        ->select('employee_tbl.*','employeetype_tbl.*')
        ->where('employee_tbl.employeeID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteEmployee(){
        $id = Input::get('deleteEmployeeID');
        $employeetbl = employee_tbl::find($id);
        $employeetbl->employeeStatus= 0;
        $employeetbl->save();
        return redirect()->back();
    }

     //Employee Type functions--------------------------------------------------------------------->

    public function employeeTypePage(){
        $employeeTypeData = DB::table('employeetype_tbl')
        ->select('*')
        ->where('employeeTypeStatus', 1)
        ->get();
        return View::make('/EmployeeTypePage')->with('employeeTypeData', $employeeTypeData);
    }

    public function addEmployeeType(Request $request){
        $employeeType = new employeetype_tbl;
        $employeeType->employeeTypeName = Input::get('addEmployeeType');
        $employeeType->employeeTypeDescription = "None";
        $employeeType->employeeRatePerHour = Input::get('addEmployeeRatePerHour');
        $employeeType->employeeTypeStatus = 1;
        $employeeType->employeeTypeImage = "No Image";
        $employeeType->save();

        Session::flash('title', 'Saved!');
        Session::flash('message', 'Employee added succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    public function editEmployeeType(){
        $id = Input::get('editEmployeeTypeID');
        $employeetypetbl = employeetype_tbl::find($id);
        $employeetypetbl->employeeTypeName= Input::get('editEmployeeTypeName');
        $employeetypetbl->employeeRatePerHour = Input::get('editEmployeeRatePerHour');
        $employeetypetbl->save();

        Session::flash('title', 'Updated!');
        Session::flash('message', 'Employee updated succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    public function retrieveEmployeeTypeData(){
        $ss = DB::table('employeetype_tbl')
        ->select('*')
        ->where('employeeTypeID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteEmployeeType(){
        $id = Input::get('deleteEmployeeTypeID');
        $employeetypetbl = employeetype_tbl::find($id);
        $employeetypetbl->employeeTypeStatus= 0;
        $employeetypetbl->save();

        Session::flash('title', 'Deleted!');
        Session::flash('message', 'Employee deleted succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

     //Event functions

    public function eventPage(){
        $eventData = DB::table('eventtype_tbl')
        ->select('*')
        ->where('eventTypeStatus', 1)->where('eventTypeStatus',1)
        ->get();
        return View::make('/EventPage')->with('eventData', $eventData);
    }

    public function addEvent(Request $request){
        $event = new eventtype_tbl;
        $event->eventTypeName = Input::get('addEventName');
        $event->eventTypeDescription = Input::get('addEventDescription');
        $event->eventTypeStatus = 1;
        $event->eventTypeAvailability = 1;
        $event->save();

        Session::flash('title', 'Saved!');
        Session::flash('message', 'Event added succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    public function editEvent(){
        $id = Input::get('editEventTypeID');
        $event = eventtype_tbl::find($id);
        $event->eventTypeName = Input::get('editEventTypeName');
        $event->eventTypeDescription = Input::get('editEventTypeDesc');
        $event->save();

        Session::flash('title', 'Updated!');
        Session::flash('message', 'Event updated succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    public function retrieveEventData(){
        $ss = DB::table('eventtype_tbl')
        ->select('*')
        ->where('eventTypeID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteEvent(){
        $id = Input::get('deleteEventTypeID');
        $event = eventtype_tbl::find($id);
        $event->eventTypeStatus = 0;
        $event->save();

        Session::flash('title', 'Deleted!');
        Session::flash('message', 'Event deleted succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

     //Location functions------------------------------------------------------------------------->

    public function locationPage(){
        $locationData = DB::table('location_tbl')
        ->select('*')
        ->where('locationStatus', 1)->where('locationAvailability',1)
        ->get();
        return View::make('/LocationPage')->with('locationData', $locationData);
    }

    public function addLocation(Request $request){
        $locationImage = ($_FILES["addLocationImage"]["name"]);
        if($locationImage==null){
            $location = new location_tbl;
            $location->locationName = Input::get('addLocationName');
            $location->locationContactPerson = Input::get('addLocationContactPerson');
            $location->locationDescription = Input::get('addLocationDescription');
            $location->locationAddress = Input::get('addLocationAddress');
            $location->locationContactNumber = Input::get('addLocationContactNumber');
            $location->locationCapacity = Input::get('addLocationCapacity');
            $location->locationImage = "No Image";
            $location->locationStatus = 1;
            $location->locationAvailability = 1;
            $location->save();
            return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["addLocationImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["addLocationImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $location = new location_tbl;
            $location->locationName = Input::get('addLocationName');
            $location->locationContactPerson = Input::get('addLocationContactPerson');
            $location->locationDescription = Input::get('addLocationDescription');
            $location->locationAddress = Input::get('addLocationAddress');
            $location->locationContactNumber = Input::get('addLocationContactNumber');
            $location->locationCapacity = Input::get('addLocationCapacity');
            $location->locationImage = $locationImage;
            $location->locationStatus = 1;
            $location->locationAvailability = 1;
            $location->save();

            Session::flash('title', 'Saved!');
            Session::flash('message', 'Location added succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        }
        // Check file size
        if ($_FILES["addLocationImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["addLocationImage"]["tmp_name"], $target_file)) {
            $location = new location_tbl;
            $location->locationName = Input::get('addLocationName');
            $location->locationContactPerson = Input::get('addLocationContactPerson');
            $location->locationDescription = Input::get('addLocationDescription');
            $location->locationAddress = Input::get('addLocationAddress');
            $location->locationContactNumber = Input::get('addLocationContactNumber');
            $location->locationCapacity = Input::get('addLocationCapacity');
            $location->locationImage = $locationImage;
            $location->locationStatus = 1;
            $location->locationAvailability = 1;
            $location->save();

            Session::flash('title', 'Saved!');
            Session::flash('message', 'Location added succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
    }

    public function editLocation(){
        $locationImage = ($_FILES["editLocationImage"]["name"]);
        if($locationImage==null){
            $id = Input::get('editLocationID');
            $location = location_tbl::find($id); 
            $location->locationName = Input::get('editLocationName');
            $location->locationContactPerson = Input::get('editLocationContactPerson');
            $location->locationDescription = Input::get('editLocationDesc');
            $location->locationAddress = Input::get('editLocationAddress');
            $location->locationContactNumber = Input::get('editLocationContactNumber');
            $location->locationCapacity = Input::get('editLocationCapacity');
            $location->locationImage = "No Image";
            $location->save();
            return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["editLocationImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["editLocationImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $id = Input::get('editLocationID');
            $location = location_tbl::find($id); 
            $location->locationName = Input::get('editLocationName');
            $location->locationContactPerson = Input::get('editLocationContactPerson');
            $location->locationDescription = Input::get('editLocationDesc');
            $location->locationAddress = Input::get('editLocationAddress');
            $location->locationContactNumber = Input::get('editLocationContactNumber');
            $location->locationCapacity = Input::get('editLocationCapacity');
            $location->locationImage = $locationImage;
            $location->save();

            Session::flash('title', 'Updated!');
            Session::flash('message', 'Location updated succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        }
        // Check file size
        if ($_FILES["editLocationImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["editLocationImage"]["tmp_name"], $target_file)) {
            $id = Input::get('editLocationID');
            $location = location_tbl::find($id); 
            $location->locationName = Input::get('editLocationName');
            $location->locationContactPerson = Input::get('editLocationContactPerson');
            $location->locationDescription = Input::get('editLocationDesc');
            $location->locationAddress = Input::get('editLocationAddress');
            $location->locationContactNumber = Input::get('editLocationContactNumber');
            $location->locationCapacity = Input::get('editLocationCapacity');
            $location->locationImage = $locationImage;
            $location->save();

            Session::flash('title', 'Saved!');
            Session::flash('message', 'Location updated succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
    }

    public function retrieveLocationData(){
        $ss = DB::table('location_tbl')
        ->select('*')
        ->where('locationID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteLocation(){
        $id = Input::get('deleteLocationID');
        $location = location_tbl::find($id); 
        $location->locationStatus = 0;
        $location->save();

        Session::flash('title', 'Deleted!');
        Session::flash('message', 'Location deleted succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    //Package functions--------------------------------------------------------------------------->

    public function packagePage(){

        $stmt = "SELECT equipment_tbl.`equipmentID`, equipmenttype_tbl.`equipmentTypeID`, equipment_tbl.`equipmentName`, equipment_tbl.`equipmentDescription`, equipment_tbl.`equipmentRatePerHour`, equipmenttype_tbl.`equipmentTypeName`, equipment_tbl.`equipmentImage`, equipment_tbl.`equipmentStatus`, SUM(equipmentlog_tbl.`equipmentQuantityIn`) as qtyIn, SUM(equipmentlog_tbl.`equipmentQuantityOut`) as qtyOut FROM equipment_tbl, equipmenttype_tbl, equipmentlog_tbl WHERE equipmenttype_tbl.`equipmentTypeStatus` = 1 AND equipment_tbl.`equipmentTypeID` = equipmenttype_tbl.`equipmentTypeID` AND equipment_tbl.`equipmentID` = equipmentlog_tbl.`equipmentID` GROUP BY equipment_tbl.`equipmentID`, equipmenttype_tbl.`equipmentTypeID`, equipment_tbl.`equipmentName`, equipment_tbl.`equipmentDescription`, equipment_tbl.`equipmentRatePerHour`, equipmenttype_tbl.`equipmentTypeName`, equipment_tbl.`equipmentImage`, equipment_tbl.`equipmentStatus`";
        $dr = DB::select($stmt);

        $packageData = DB::table('package_tbl')
        ->where('packageStatus', 1)->where('packageAvailability',1)
        ->get();

        $dishTypeData = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeStatus', 1)->where('dishTypeStatus',1)
        ->get();

        $equipmentData = DB::table('equipment_tbl')
        ->select('*')
        ->where('equipmentStatus', 1)->where('equipmentStatus',1)
        ->get();

        $serviceData = DB::table('service_tbl')
        ->select('*')
        ->where('serviceStatus', 1)
        ->get();

        $staffData = DB::table('employeetype_tbl')
        ->select('*')
        ->where('employeeTypeStatus', 1)
        ->get();

        return View::make('/PackagePage')
        ->with('packageData', $packageData)
        ->with('dishTypeData', $dishTypeData)
        ->with('equipmentData', $equipmentData)
        ->with('serviceData', $serviceData)
        ->with('staffData', $staffData);
    }

    public function addPackage(Request $request){
        $packageImage = ($_FILES["addPackageImage"]["name"]);
        if($packageImage==null){
            $package = new package_tbl;
            $package->packageName = Input::get('addPackageName');
            $package->packageDescription = Input::get('addPackageDescription');
            $package->packageCost = Input::get('addPackageCost');
            $package->packageImage = "No Image";
            $package->packageStatus = 1;
            $package->packageAvailability = 1;
            $package->save();
            $lastPackageID = DB::table('package_tbl')
            ->max('packageID');
            $dti = $_POST['addDishTypeInclusion'];
            $si = $_POST['addStaffInclusion'];
            $ei = $_POST['addEquipmentInclusion'];
            $svi = $_POST['addServiceInclusion'];
            foreach ($dti as $dtinclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $lastPackageID;
                $packageInclusion->dishTypeID = $dtinclusion;
                $packageInclusion->save();
            }
            foreach ($si as $staffInclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $lastPackageID;
                $packageInclusion->employeeTypeID = $staffInclusion;
                $packageInclusion->save();
            }
            foreach ($ei as $equipmentInclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $lastPackageID;
                $packageInclusion->equipmentID = $equipmentInclusion;
                $packageInclusion->save();
            }
            foreach ($svi as $serviceInclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $lastPackageID;
                $packageInclusion->serviceID = $serviceInclusion;
                $packageInclusion->save();
            }
            return redirect()->back();
        }
        else{
            $target_dir = "img\\";
            $target_file = $target_dir . basename($_FILES["addPackageImage"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["addPackageImage"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $package = new package_tbl;
                $package->packageName = Input::get('addPackageName');
                $package->packageDescription = Input::get('addPackageDescription');
                $package->packageCost = Input::get('addPackageCost');
                $package->packageImage = $packageImage;
                $package->packageStatus = 1;
                $package->packageAvailability = 1;
                $package->save();
                $lastPackageID = DB::table('package_tbl')
                ->max('packageID');
                $dti = $_POST['addDishTypeInclusion'];
                $si = $_POST['addStaffInclusion'];
                $ei = $_POST['addEquipmentInclusion'];
                $svi = $_POST['addServiceInclusion'];
                foreach ($dti as $dtinclusion) {
                    $packageInclusion = new packageinclusion_tbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->dishTypeID = $dtinclusion;
                    $packageInclusion->save();
                }
                foreach ($si as $staffInclusion) {
                    $packageInclusion = new packageinclusion_tbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->employeeTypeID = $staffInclusion;
                    $packageInclusion->save();
                }
                foreach ($ei as $equipmentInclusion) {
                    $packageInclusion = new packageinclusion_tbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->equipmentID = $equipmentInclusion;
                    $packageInclusion->save();
                }
                foreach ($svi as $serviceInclusion) {
                    $packageInclusion = new packageinclusion_tbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->serviceID = $serviceInclusion;
                    $packageInclusion->save();
                }

                Session::flash('title', 'Saved!');
                Session::flash('message', 'Package added succesfully.');
                Session::flash('type', 'success');

                return redirect()->back();
            }
            // Check file size
            if ($_FILES["addPackageImage"]["size"] > 500000) {
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                // if everything is ok, try to upload file
            } else {
            if (move_uploaded_file($_FILES["addPackageImage"]["tmp_name"], $target_file)) {
                $package = new package_tbl;
                $package->packageName = Input::get('addPackageName');
                $package->packageDescription = Input::get('addPackageDescription');
                $package->packageCost = Input::get('addPackageCost');
                $package->packageImage = $packageImage;
                $package->packageStatus = 1;
                $package->packageAvailability = 1;
                $package->save();
                $lastPackageID = DB::table('package_tbl')
                ->max('packageID');
                $dti = $_POST['addDishTypeInclusion'];
                $si = $_POST['addStaffInclusion'];
                $ei = $_POST['addEquipmentInclusion'];
                $svi = $_POST['addServiceInclusion'];
                foreach ($dti as $dtinclusion) {
                    $packageInclusion = new packageinclusion_tbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->dishTypeID = $dtinclusion;
                    $packageInclusion->save();
                }
                foreach ($si as $staffInclusion) {
                    $packageInclusion = new packageinclusion_tbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->employeeTypeID = $staffInclusion;
                    $packageInclusion->save();
                }
                foreach ($ei as $equipmentInclusion) {
                    $packageInclusion = new packageinclusion_tbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->equipmentID = $equipmentInclusion;
                    $packageInclusion->save();
                }
                foreach ($svi as $serviceInclusion) {
                    $packageInclusion = new packageinclusion_tbl;
                    $packageInclusion->packageID = $lastPackageID;
                    $packageInclusion->serviceID = $serviceInclusion;
                    $packageInclusion->save();
                }

                Session::flash('title', 'Saved!');
                Session::flash('message', 'Package added succesfully.');
                Session::flash('type', 'success');

                return redirect()->back();
            } else {
                return \Redirect::back();
            }
            }
        }
        
    }

    public function editPackage(){
        $id = Input::get('editPackageID');
        $deletePackageInclusion = DB::table('packageinclusion_tbl')
        ->where('packageID', $id)
        ->update(['packageInclusionStatus' => 0]);

        $packageImage = ($_FILES["editPackageImage"]["name"]);
        if($packageImage==null){
            $package = package_tbl::find($id); 
            $package->packageName = Input::get('editPackageName');
            $package->packageDescription = Input::get('editPackageDescription');
            $package->packageCost = Input::get('editPackageCost');
            $package->packageImage = "No Image";
            $package->save();
            $dti = $_POST['editDishTypeInclusion'];
            $si = $_POST['editStaffInclusion'];
            $ei = $_POST['editEquipmentInclusion'];
            $svi = $_POST['editServiceInclusion'];
            foreach ($dti as $dtinclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $id;
                $packageInclusion->dishTypeID = $dtinclusion;
                $packageInclusion->save();
            }
            foreach ($si as $staffInclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $id;
                $packageInclusion->employeeTypeID = $staffInclusion;
                $packageInclusion->save();
            }
            foreach ($ei as $equipmentInclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $id;
                $packageInclusion->equipmentID = $equipmentInclusion;
                $packageInclusion->save();
            }
            foreach ($svi as $serviceInclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $id;
                $packageInclusion->serviceID = $serviceInclusion;
                $packageInclusion->save();
            }

            return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["editPackageImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["editPackageImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
           $id = Input::get('editPackageID');
            $package = package_tbl::find($id); 
            $package->packageName = Input::get('editPackageName');
            $package->packageDescription = Input::get('editPackageDescription');
            $package->packageCost = Input::get('editPackageCost');
            $package->packageImage = $packageImage;
            $package->save();
            $dti = $_POST['editDishTypeInclusion'];
            $si = $_POST['editStaffInclusion'];
            $ei = $_POST['editEquipmentInclusion'];
            $svi = $_POST['editServiceInclusion'];
            foreach ($dti as $dtinclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $id;
                $packageInclusion->dishTypeID = $dtinclusion;
                $packageInclusion->save();
            }
            foreach ($si as $staffInclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $id;
                $packageInclusion->employeeTypeID = $staffInclusion;
                $packageInclusion->save();
            }
            foreach ($ei as $equipmentInclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $id;
                $packageInclusion->equipmentID = $equipmentInclusion;
                $packageInclusion->save();
            }
            foreach ($svi as $serviceInclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $id;
                $packageInclusion->serviceID = $serviceInclusion;
                $packageInclusion->save();
            }

            Session::flash('title', 'Updated!');
            Session::flash('message', 'Package updated succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        }
        // Check file size
        if ($_FILES["editPackageImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["editPackageImage"]["tmp_name"], $target_file)) {
           $id = Input::get('editPackageID');
            $package = package_tbl::find($id); 
            $package->packageName = Input::get('editPackageName');
            $package->packageDescription = Input::get('editPackageDescription');
            $package->packageCost = Input::get('editPackageCost');
            $package->packageImage = $packageImage;
            $package->save();
            $dti = $_POST['editDishTypeInclusion'];
            $si = $_POST['editStaffInclusion'];
            $ei = $_POST['editEquipmentInclusion'];
            $svi = $_POST['editServiceInclusion'];
            foreach ($dti as $dtinclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $id;
                $packageInclusion->dishTypeID = $dtinclusion;
                $packageInclusion->save();
            }
            foreach ($si as $staffInclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $id;
                $packageInclusion->employeeTypeID = $staffInclusion;
                $packageInclusion->save();
            }
            foreach ($ei as $equipmentInclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $id;
                $packageInclusion->equipmentID = $equipmentInclusion;
                $packageInclusion->save();
            }
            foreach ($svi as $serviceInclusion) {
                $packageInclusion = new packageinclusion_tbl;
                $packageInclusion->packageID = $id;
                $packageInclusion->serviceID = $serviceInclusion;
                $packageInclusion->save();
            }

            Session::flash('title', 'Updated!');
            Session::flash('message', 'Package updated succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
    }

    public function inclusionChange(){
        $qq = DB::table('packageinclusion_tbl')
        ->join('dishtype_tbl', 'dishtype_tbl.dishTypeID', '=', 'packageinclusion_tbl.dishTypeID')
        ->where('packageinclusion_tbl.packageID', Input::get('packageID'))
        ->get();

         $dd = DB::table('packageinclusion_tbl')
        ->join('service_tbl', 'service_tbl.serviceID', '=', 'packageinclusion_tbl.serviceID')
        ->where('packageinclusion_tbl.packageID', Input::get('packageID'))
        ->get();

        $ff = DB::table('packageinclusion_tbl')
        ->join('equipment_tbl', 'equipment_tbl.equipmentID', '=', 'packageinclusion_tbl.equipmentID')
        ->where('packageinclusion_tbl.packageID', Input::get('packageID'))
        ->get();

        $gg = DB::table('packageinclusion_tbl')
        ->join('employeetype_tbl', 'employeetype_tbl.employeeTypeID', '=', 'packageinclusion_tbl.employeeTypeID')
        ->where('packageinclusion_tbl.packageID', Input::get('packageID'))
        ->get();

        $ww = DB::table('dish_tbl')
        ->join('dishtype_tbl','dishtype_tbl.dishTypeID','=','dish_tbl.dishTypeID')
        ->get();
         return \Response::json(['qq'=>$qq,'dd'=>$dd,'ff'=>$ff,'gg'=>$gg,'ww'=>$ww,]);
    }

    public function retrievePackageData(){
        $ss = DB::table('package_tbl')
        ->select('*')
        ->where('packageID', Input::get('sdid'))
        ->get();

        $dd = DB::table('packageinclusion_tbl')
        ->join('service_tbl', 'service_tbl.serviceID', '=', 'packageinclusion_tbl.serviceID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->where('packageinclusion_tbl.packageInclusionStatus', 1)
        ->get();

        $ff = DB::table('packageinclusion_tbl')
        ->join('equipment_tbl', 'equipment_tbl.equipmentID', '=', 'packageinclusion_tbl.equipmentID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->where('packageinclusion_tbl.packageInclusionStatus', 1)
        ->get();

        $gg = DB::table('packageinclusion_tbl')
        ->join('employeetype_tbl', 'employeetype_tbl.employeeTypeID', '=', 'packageinclusion_tbl.employeeTypeID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->where('packageinclusion_tbl.packageInclusionStatus', 1)
        ->get();

        $dishInclusion = DB::table('packageinclusion_tbl')
        ->join('dishtype_tbl', 'dishtype_tbl.dishTypeID', '=', 'packageinclusion_tbl.dishTypeID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->where('packageinclusion_tbl.packageInclusionStatus', 1)
        ->get();


        return \Response::json(['ss'=>$ss, 'dishInclusion'=>$dishInclusion, 'equipmentInclusion'=>$ff, 'staffInclusion'=>$gg, 'serviceInclusion'=>$dd,]);
    }

    public function retrievePackageInclusion(){
        $reservationID = Input::get('sendReservationID');
        $ss = DB::table('dishavailed_tbl')
        ->join('dish_tbl','dish_tbl.dishID','=','dishavailed_tbl.dishID')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','dishavailed_tbl.reservationID')
        ->join('dishtype_tbl','dishtype_tbl.dishTypeID','=','dish_tbl.dishTypeID')
        ->where('dishavailed_tbl.reservationID', $reservationID)
        ->get();

        $ww = DB::table('dish_tbl')
        ->join('dishtype_tbl','dishtype_tbl.dishTypeID','=','dish_tbl.dishTypeID')
        ->get();
        

        $dd = DB::table('packageinclusion_tbl')
        ->join('service_tbl', 'service_tbl.serviceID', '=', 'packageinclusion_tbl.serviceID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->where('packageinclusion_tbl.packageInclusionStatus', 1)
        ->get();

        $ff = DB::table('packageinclusion_tbl')
        ->join('equipment_tbl', 'equipment_tbl.equipmentID', '=', 'packageinclusion_tbl.equipmentID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->where('packageinclusion_tbl.packageInclusionStatus', 1)
        ->get();

        $gg = DB::table('packageinclusion_tbl')
        ->join('employeetype_tbl', 'employeetype_tbl.employeeTypeID', '=', 'packageinclusion_tbl.employeeTypeID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->where('packageinclusion_tbl.packageInclusionStatus', 1)
        ->get();

        $dishInclusion = DB::table('packageinclusion_tbl')
        ->join('dishtype_tbl', 'dishtype_tbl.dishTypeID', '=', 'packageinclusion_tbl.dishTypeID')
        ->where('packageinclusion_tbl.packageID', Input::get('sdid'))
        ->where('packageinclusion_tbl.packageInclusionStatus', 1)
        ->get();

        $dishData = DB::table('dish_tbl')
        ->get();

        $dishTypeData = DB::table('dishtype_tbl')
        ->get();

        $additionalDish = DB::table('dishadditional_tbl')
        ->join('reservation_tbl', 'reservation_tbl.reservationID','=','dishadditional_tbl.reservationID')
        ->join('dish_tbl','dish_tbl.dishID', '=', 'dishadditional_tbl.dishID')
        ->where('dishadditional_tbl.reservationID', Input::get('sendReservationID'))
        ->get();

        $additionalEquipment = DB::table('equipmentadditional_tbl')
        ->join('reservation_tbl', 'reservation_tbl.reservationID','=','equipmentadditional_tbl.reservationID')
        ->join('equipment_tbl','equipment_tbl.equipmentID', '=', 'equipmentadditional_tbl.equipmentID')
        ->where('equipmentadditional_tbl.reservationID', Input::get('sendReservationID'))
        ->get();

        $additionalService = DB::table('serviceadditional_tbl')
        ->join('reservation_tbl', 'reservation_tbl.reservationID','=','serviceadditional_tbl.reservationID')
        ->join('service_tbl','service_tbl.serviceID', '=', 'serviceadditional_tbl.serviceID')
        ->where('serviceadditional_tbl.reservationID', Input::get('sendReservationID'))
        ->get();

        $additionalEmployee = DB::table('employeeadditional_tbl')
        ->join('reservation_tbl', 'reservation_tbl.reservationID','=','employeeadditional_tbl.reservationID')
        ->join('employeetype_tbl','employeetype_tbl.employeeTypeID', '=', 'employeeadditional_tbl.employeeTypeID')
        ->where('employeeadditional_tbl.reservationID', Input::get('sendReservationID'))
        ->get();

        

        return \Response::json(['ss'=>$ss, 'ww'=>$ww, 'gg'=>$gg, 'ff'=>$ff, 'dd'=>$dd, 'additionalDish'=>$additionalDish, 'additionalEquipment'=>$additionalEquipment, 'additionalService'=>$additionalService, 'additionalEmployee'=>$additionalEmployee, 'dishTypeData'=>$dishTypeData, 'dishData'=>$dishData, 'dishInclusion'=>$dishInclusion]);
    }
    public function assignRetrieve(){
         $ass =  Input::get('sdid'); 
        $stmt = "SELECT equipment_tbl.`equipmentName`, equipment_tbl.`equipmentID`, SUM(equipmentlog_tbl.`equipmentQuantityIn`) as qtyIn FROM equipment_tbl, equipmenttype_tbl, equipmentlog_tbl, packageinclusion_tbl WHERE equipment_tbl.`equipmentID` = packageinclusion_tbl.`equipmentID` AND equipment_tbl.`equipmentTypeID` = equipmenttype_tbl.`equipmentTypeID` AND equipment_tbl.`equipmentID` = equipmentlog_tbl.`equipmentID` AND packageinclusion_tbl.`packageID` = '$ass' GROUP BY equipment_tbl.`equipmentName`, equipment_tbl.`equipmentID` ";
        $rr = DB::select($stmt);

        $asss =  Input::get('sendReservationID'); 
        $stmts = "SELECT equipment_tbl.`equipmentName`, equipmentadditional_tbl.`equipmentAdditionalQty`, SUM(equipmentlog_tbl.`equipmentQuantityIn`) as qtyIn FROM equipment_tbl, equipmenttype_tbl, equipmentlog_tbl, equipmentadditional_tbl, reservation_tbl WHERE reservation_tbl.`reservationID` =equipmentadditional_tbl.`reservationID` AND equipment_tbl.`equipmentID` = equipmentadditional_tbl.`equipmentID` AND equipment_tbl.`equipmentTypeID` = equipmenttype_tbl.`equipmentTypeID` AND equipment_tbl.`equipmentID` = equipmentlog_tbl.`equipmentID` AND equipmentadditional_tbl.`reservationID` = '$asss' GROUP BY equipment_tbl.`equipmentName`, equipmentadditional_tbl.`equipmentAdditionalQty`";
        $tt = DB::select($stmts);
        return \Response::json(['rr'=>$rr, 'tt'=>$tt]);
    }

    public function deletePackage(){
        $id = Input::get('deletePackageID');
        $package = package_tbl::find($id); 
        $package->packageStatus = 0;
        $package->save();

        Session::flash('title', 'Deleted!');
        Session::flash('message', 'Package deleted succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }
    //Equipment functions------------------------------------------------------------------------->

    public function equipmentPage(){
        // $equipmentData = DB::table('equipment_tbl')
        // ->join('equipmenttype_tbl','equipmenttype_tbl.equipmentTypeID','=','equipment_tbl.equipmentTypeID')
        // ->join('equipmentlog_tbl', 'equipmentlog_tbl.equipmentTypeID', '=', 'equipment_tbl.equipmentID')
        // ->select('*')
        // ->where('equipmentStatus', 1)
        // ->get();

       $stmt = "SELECT equipment_tbl.`equipmentID`, equipmenttype_tbl.`equipmentTypeID`, equipment_tbl.`equipmentName`, equipment_tbl.`equipmentDescription`, equipment_tbl.`equipmentRatePerHour`, equipmenttype_tbl.`equipmentTypeName`, equipment_tbl.`equipmentImage`, equipment_tbl.`equipmentStatus`, SUM(equipmentlog_tbl.`equipmentQuantityIn`) as qtyIn, SUM(equipmentlog_tbl.`equipmentQuantityOut`) as qtyOut FROM equipment_tbl, equipmenttype_tbl, equipmentlog_tbl WHERE equipmenttype_tbl.`equipmentTypeStatus` = 1 AND equipment_tbl.`equipmentTypeID` = equipmenttype_tbl.`equipmentTypeID` AND equipment_tbl.`equipmentID` = equipmentlog_tbl.`equipmentID` GROUP BY equipment_tbl.`equipmentID`, equipmenttype_tbl.`equipmentTypeID`, equipment_tbl.`equipmentName`, equipment_tbl.`equipmentDescription`, equipment_tbl.`equipmentRatePerHour`, equipmenttype_tbl.`equipmentTypeName`, equipment_tbl.`equipmentImage`, equipment_tbl.`equipmentStatus`";
        $dr = DB::select($stmt);

        $addEquipmentData = DB::table('equipmenttype_tbl')
        ->select('*')
        ->where('equipmentTypeStatus', 1)
        ->get();

        return View::make('/equipmentPage')
        ->with('equipmentData', $dr)
        ->with('addEquipmentData', $addEquipmentData);
    }

    public function addEquipment(Request $request){
        
        $equipmentImage = ($_FILES["addEquipmentImage"]["name"]);
        if($equipmentImage==null){
        $equipment = new equipment_tbl;
        $equipment->equipmentName = Input::get('addEquipmentName');
        $equipment->equipmentDescription = Input::get('addEquipmentDescription');
        $equipment->equipmentRatePerHour = Input::get('addEquipmentRatePerHour');
        $equipment->equipmentAvailability = 1;
        $equipment->equipmentStatus = 1;
        $equipment->equipmentTypeID = Input::get('addEquipmentType');
        $equipment->equipmentImage = "No Image";
        $equipment->save();
        $getEquipmentID = DB::table('equipment_tbl')
        ->MAX('equipmentID');
        $equipmentlog = new equipmentlog_tbl;
        $equipmentlog->equipmentID = $getEquipmentID;
        $equipmentlog->equipmentQuantityIn = 0;
        $equipmentlog->equipmentQuantityOut = 0;
        $equipmentlog->equipmentLogDate = Date_create('now');
        $equipmentlog->save();
        return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["addEquipmentImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["addEquipmentImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $equipment = new equipment_tbl;
            $equipment->equipmentName = Input::get('addEquipmentName');
            $equipment->equipmentDescription = Input::get('addEquipmentDescription');
            $equipment->equipmentRatePerHour = Input::get('addEquipmentRatePerHour');
            $equipment->equipmentAvailability = 1;
            $equipment->equipmentStatus = 1;
            $equipment->equipmentTypeID = Input::get('addEquipmentType');
            $equipment->equipmentImage = $equipmentImage;
            $equipment->save();
            $getEquipmentID = DB::table('equipment_tbl')
            ->MAX('equipmentID');
            $equipmentlog = new equipmentlog_tbl;
            $equipmentlog->equipmentID = $getEquipmentID;
            $equipmentlog->equipmentQuantityIn = 0;
            $equipmentlog->equipmentQuantityOut = 0;
            $equipmentlog->equipmentLogDate = Date_create('now');
            $equipmentlog->save();
            return redirect()->back();
        }
        // Check file size
        if ($_FILES["addEquipmentImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["addEquipmentImage"]["tmp_name"], $target_file)) {
        $equipment = new equipment_tbl;
        $equipment->equipmentName = Input::get('addEquipmentName');
        $equipment->equipmentDescription = Input::get('addEquipmentDescription');
        $equipment->equipmentRatePerHour = Input::get('addEquipmentRatePerHour');
        $equipment->equipmentUnit = 0;
        $equipment->equipmentAvailability = 1;
        $equipment->equipmentStatus = 1;
        $equipment->equipmentImage = ($_FILES["addEquipmentImage"]["name"]);
        $equipment->save();
        return redirect()->back();

        } else {
            alert('File Not Uploaded!');
            return \Redirect::back();
        }
        }
        }
    }

    public function editEquipment(){
        $equipmentImage = ($_FILES["editEquipmentImage"]["name"]);
        if($equipmentImage==null){
        $id = Input::get('editEquipmentID');
        $equipment = equipment_tbl::find($id);
        $equipment->equipmentName = Input::get('editEquipmentName');
        $equipment->equipmentDescription = Input::get('editEquipmentDescription');
        $equipment->equipmentTypeID = Input::get('editEquipmentType');
        $equipment->equipmentRatePerHour = Input::get('editEquipmentRatePerHour');
        $equipment->save();
        return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["editEquipmentImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["editEquipmentImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $id = Input::get('editEquipmentID');
            $equipment = equipment_tbl::find($id);
            $equipment->equipmentName = Input::get('editEquipmentName');
            $equipment->equipmentDescription = Input::get('editEquipmentDescription');
            $equipment->equipmentTypeID = Input::get('editEquipmentType');
            $equipment->equipmentRatePerHour = Input::get('editEquipmentRatePerHour');
            $equipment->equipmentImage = $equipmentImage;
            $equipment->save();

            Session::flash('title', 'Updated!');
            Session::flash('message', 'Equipment updated succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        }
        // Check file size
        if ($_FILES["editEquipmentImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["editEquipmentImage"]["tmp_name"], $target_file)) {
            $id = Input::get('editEquipmentID');
            $equipment = equipment_tbl::find($id);
            $equipment->equipmentName = Input::get('editEquipmentName');
            $equipment->equipmentDescription = Input::get('editEquipmentDescription');
            $equipment->equipmentTypeID = Input::get('editEquipmentType');
            $equipment->equipmentRatePerHour = Input::get('editEquipmentRatePerHour');
            $equipment->equipmentImage = $equipmentImage;
            $equipment->save();

            Session::flash('title', 'Updated!');
            Session::flash('message', 'Equipment updated succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();

        } else {
            Session::flash('title', 'Error!');
            Session::flash('message', 'File not updated.');
            Session::flash('type', 'error');

            return \Redirect::back();
        }
        }
        }
    }

    public function retrieveEquipmentData(){
        $ss = DB::table('equipment_tbl')
        ->select('*')
        ->where('equipmentID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteEquipment(){
        $id = Input::get('deleteEquipmentID');
        $equipment = equipment_tbl::find($id);
        $equipment->equipmentStatus = 0;
        $equipment->save();
        return redirect()->back();
    }

    //Equipment Type Functions-------------------------------------------------------------------->
    public function equipmentTypePage(){
        $equipmentData = DB::table('equipmenttype_tbl')
        ->select('*')
        ->where('equipmentTypeStatus', 1)
        ->get();
        return View::make('/EquipmentTypePage')->with('equipmentTypeData', $equipmentData);
    }

    public function addEquipmentType(Request $request){

        $equipmentType = new equipmenttype_tbl;
        $equipmentType->equipmentTypeName = Input::get('addEquipmentTypeName');
        $equipmentType->equipmentTypeStatus = 1;
        $equipmentType->equipmentTypeImage = "No Image";
        $equipmentType->save();

        Session::flash('title', 'Saved!');
        Session::flash('message', 'Equipment type added succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    public function retrieveEquipmentTypeData(){
        $ss = DB::table('equipmenttype_tbl')
        ->select('*')
        ->where('equipmentTypeID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteEquipmentType(){
        $id = Input::get('deleteEquipmentTypeID');
        $equipmentType = equipmenttype_tbl::find($id);
        $equipmentType->equipmentTypeStatus = 0;
        $equipmentType->save();

        Session::flash('title', 'Deleted!');
        Session::flash('message', 'Equipment type removed succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    public function editEquipmentType(){
        $id = Input::get('editEquipmentTypeID');
        $equipmentType = equipmenttype_tbl::find($id);
        $equipmentType->equipmentTypeName = Input::get('editEquipmentTypeName');
        $equipmentType->save();

        Session::flash('title', 'Updated!');
        Session::flash('message', 'Equipment type updated succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

     public function inventoryEquipmentPage(){
        // $equipmentData = DB::table('equipment_tbl')
        // ->join('equipmenttype_tbl','equipmenttype_tbl.equipmentTypeID','=','equipment_tbl.equipmentTypeID')
        // // ->join('equipmentlog_tbl', 'equipmentlog_tbl.equipmentTypeID', '=', 'equipment_tbl.equipmentID')
        // ->select('*')
        // ->where('equipmentStatus', 1)
        // ->get();

        $stmt = "SELECT equipment_tbl.`equipmentID`, equipmenttype_tbl.`equipmentTypeID`, equipment_tbl.`equipmentName`, equipment_tbl.`equipmentDescription`, equipment_tbl.`equipmentRatePerHour`, equipmenttype_tbl.`equipmentTypeName`, equipment_tbl.`equipmentImage`, SUM(equipmentlog_tbl.`equipmentQuantityIn`) as qtyIn, SUM(equipmentlog_tbl.`equipmentQuantityOut`) as qtyOut FROM equipment_tbl, equipmenttype_tbl, equipmentlog_tbl WHERE equipment_tbl.`equipmentTypeID` = equipmenttype_tbl.`equipmentTypeID` AND equipment_tbl.`equipmentID` = equipmentlog_tbl.`equipmentID` GROUP BY equipment_tbl.`equipmentID`, equipmenttype_tbl.`equipmentTypeID`, equipment_tbl.`equipmentName`, equipment_tbl.`equipmentDescription`, equipment_tbl.`equipmentRatePerHour`, equipmenttype_tbl.`equipmentTypeName`, equipment_tbl.`equipmentImage`";
        $dr = DB::select($stmt);

        $addEquipmentData = DB::table('equipmenttype_tbl')
        ->select('*')
        ->where('equipmentTypeStatus', 1)
        ->get();

        return View::make('/inventory_equipmentPage')
        ->with('equipmentData', $dr)
        ->with('addEquipmentData', $addEquipmentData);
    }

    //Purchase Order functions...

    public function inventoryPOPage(){
        $poData = DB::table('purchaseorder_tbl')
        ->join('purchaseordertype_tbl','purchaseordertype_tbl.poTypeId','=','purchaseorder_tbl.poTypeId')
        ->select('*')
        ->where('poStatus', 1)
        ->get();


$uomData = DB::table('unitmeasurement_tbl')
        ->select('*')
        ->where('uomStatus', 1)
        ->get();



        $poTypeData = DB::table('purchaseordertype_tbl')
        ->select('*')
        ->where('poTypeStatus', 1)
        ->get();

        $equipmentType = DB::table('equipmenttype_tbl')
        ->select('*')
        ->where('equipmentTypeStatus', 1)
        ->get();

       $existingPO = DB::table('purchaseorder_tbl')
        ->join('purchaseordertype_tbl','purchaseordertype_tbl.poTypeId','=','purchaseorder_tbl.poTypeId')
        ->select('*')
        ->where('purchaseorder_tbl.poTypeId', 1)
        ->get();

        return View::make('/inventory_purchaseOrderPage')
        ->with('poData', $poData)
        ->with('poTypeData', $poTypeData)
        ->with('equipmentType', $equipmentType)
        ->with('uomData', $uomData)
        ->with('existingPO', $existingPO);

    }

    public function retrievePOFood(){
        $existingPOFood = DB::table('purchaseorder_tbl')
        ->join('purchaseordertype_tbl','purchaseordertype_tbl.poTypeId','=','purchaseorder_tbl.poTypeId')
        ->select('*')
        ->where('purchaseorder_tbl.poTypeId', 1)
        ->get();
        return \Response::json(['existingPOFood'=>$existingPOFood]);
    }

    public function retrievePOEquipment(){
        $existingPOEquipment = DB::table('equipment_tbl')
        ->join('equipmenttype_tbl','equipmenttype_tbl.equipmentTypeID','=','equipment_tbl.equipmentTypeID')
        ->select('*')
        ->get();
        return \Response::json(['existingPOEquipment'=>$existingPOEquipment]);
    }

    public function addPO(Request $request){
        $dateTime = Date_create('now');
        $dateToday = $dateTime->format('Y-n-j');
        $checker = Input::get('checkboxChecker');
        $categoryChecker = Input::get('categoryChecker');
        // New Item
        if($checker==1){
            // Food
            if($categoryChecker==0){
                $po = new purchaseorder_tbl;
                $po->poItemName = Input::get('addPOName');
                $po->poDescription = Input::get('addPODescription');
                $po->poDate = $dateToday;
                $po->poQty = Input::get('addPOQty');
                $po->poPrice = Input::get('addPOPrice');
                $po->poTypeId = Input::get('addPOType');
                $po->poStatus = 1;
                $po->uomID = Input::get('addUOM');
                $po->save();

                Session::flash('title', 'Saved!');
                Session::flash('message', 'Purchase order added succesfully.');
                Session::flash('type', 'success');
            }
            // Equipment
            if($categoryChecker==1){
                //Save Purchase Order
                $po = new purchaseorder_tbl;
                $po->poItemName = Input::get('addPOName');
                $po->poDescription = Input::get('addPODescription');
                $po->poDate = $dateToday;
                $po->poQty = Input::get('addPOQty');
                $po->poPrice = Input::get('addPOPrice');
                $po->poTypeId = Input::get('addPOType');
                $po->poStatus = 1;
                $po->uomID = Input::get('addUOM');
                $po->save();

                Session::flash('title', 'Saved!');
                Session::flash('message', 'Purchase order added succesfully.');
                Session::flash('type', 'success');

                //Save Equipment Maintenance 
                $equipment = new equipment_tbl;
                $equipment->equipmentName = Input::get('addPOName');
                $equipment->equipmentDescription = Input::get('addPODescription');
                $equipment->equipmentRatePerHour = Input::get('addRatePerHour');
                $equipment->equipmentAvailability = 1;
                $equipment->equipmentStatus = 1;
                $equipment->equipmentTypeID = Input::get('addEquipmentType');
                $equipment->equipmentImage = "No Image";
                $equipment->save();

                Session::flash('title', 'Saved!');
                Session::flash('message', 'Purchase order added succesfully.');
                Session::flash('type', 'success');

                // Save Equipment Inventory
                $getEquipmentID = DB::table('equipment_tbl')
                ->MAX('equipmentID');
                $equipmentlog = new equipmentlog_tbl;
                $equipmentlog->equipmentID = $getEquipmentID;
                $equipmentlog->equipmentQuantityIn = Input::get('addPOQty');
                $equipmentlog->equipmentQuantityOut = 0;
                $equipmentlog->equipmentLogDate = Date_create('now');
                $equipmentlog->save();

                Session::flash('title', 'Saved!');
                Session::flash('message', 'Purchase order added succesfully.');
                Session::flash('type', 'success');
            }
        }
        // Existing Item
        if($checker==0){
            //Food
            if($categoryChecker==0){
                $po = new purchaseorder_tbl;
                $po->poItemName = Input::get('addExistingItemName');
                $po->poDescription = Input::get('addPODescription');
                $po->poDate = $dateToday;
                $po->poQty = Input::get('addPOQty');
                $po->poPrice = Input::get('addPOPrice');
                $po->poTypeId = Input::get('addPOType');
                $po->poStatus = 1;
                $po->save();

                Session::flash('title', 'Saved!');
                Session::flash('message', 'Purchase order added succesfully.');
                Session::flash('type', 'success');
            }
            //Equipment
            if($categoryChecker==1){
                //Save Purchase Order
                $po = new purchaseorder_tbl;
                $po->poItemName = Input::get('addExistingItemName');
                $po->poDescription = Input::get('addPODescription');
                $po->poDate = $dateToday;
                $po->poQty = Input::get('addPOQty');
                $po->poPrice = Input::get('addPOPrice');
                $po->poTypeId = Input::get('addPOType');
                $po->poStatus = 1;
                $po->save();

                Session::flash('title', 'Saved!');
                Session::flash('message', 'Purchase order added succesfully.');
                Session::flash('type', 'success');

                $itemID = Input::get('addExistingItemName');

                //Save Inventory
                $equipmentlog = new equipmentlog_tbl;
                $equipmentlog->equipmentID = $itemID;
                $equipmentlog->equipmentQuantityIn = Input::get('addPOQty');
                $equipmentlog->equipmentQuantityOut = 0;
                $equipmentlog->equipmentLogDate = Date_create('now');
                $equipmentlog->save();

            }
            
        }
        return redirect()->back();
        
        
    }
    public function uomPage(){
    $uomData = DB::table('unitmeasurement_tbl')
        ->select('*')
        ->where('uomStatus', 1)
        ->get();
        return View::make('/uomPage')->with('uomData', $uomData);
    }

    public function retrieveUOM(){
        $uomData = DB::table('unitmeasurement_tbl')
        ->select('*')
        ->where('uomID', Input::get('sendID'))
        ->get();
        return \Response::json(['uomData'=>$uomData]);
    }

     public function addUOM(Request $request){
        $uom = new unitmeasurement_tbl;
        $uom->uomName = Input::get('addUOMName');
        $uom->uomStatus = 1;
        $uom->save();
        return redirect()->back();
    }

    public function deleteUOM(Request $request){
        $id = Input::get('deleteUOMID');
        $uom = unitmeasurement_tbl::find($id);
        $uom->uomStatus = 0;
        $uom->save();
        return redirect()->back();
    }

    public function editUOM(Request $request){
        $id = Input::get('editUOMID');
        $uom = unitmeasurement_tbl::find($id);
        $uom->uomName = Input::get('editUOMName');
        $uom->uomStatus = 1;
        $uom->save();
        return redirect()->back();
    }
    public function retrieveEquipmentID(){
        $itemName = Input::get('strUser');
        $stmt = "SELECT `equipmentID` FROM equipment_tbl where `equipmentName` = '$itemName'";
        $dr = DB::select($stmt);
        return \Response::json(['newEquipmentID'=>$dr]);
    }

    public function inventoryPOTypePage(){
        $poTypeData = DB::table('purchaseordertype_tbl')
        ->select('*')
        ->where('poTypeStatus',1)
        ->get();

        return View::make('/inventory_purchaseOrderTypePage')
        ->with('poTypeData', $poTypeData);
    }

    public function addPOType(Request $request){
        $poType = new purchaseordertype_tbl;
        $poType->poTypeName = Input::get('addPOCategoryName');
        $poType->poTypeStatus = 1;
        $poType->save();
        return redirect()->back();
    }

    public function retrievePOTypeData(){
        $poTypeData = DB::table('purchaseordertype_tbl')
        ->select('*')
        ->where('poTypeId', Input::get('getId'))
        ->get();
        return \Response::json(['poTypeData'=>$poTypeData]);
    }

    public function editPOType(){
        $id = Input::get('editPOTypeId');
        $poType = purchaseordertype_tbl::find($id);
        $poType->poTypeName = Input::get('editPOTypeName');
        $poType->save();
        return redirect()->back();
    }

    public function deletePOType(){
        $id = Input::get('deletePOTypeId');
        $poType = purchaseordertype_tbl::find($id);
        $poType->poTypeStatus = 0;
        $poType->save();
        return redirect()->back();
    }


    //Service functions--------------------------------------------------------------------------->

    public function servicePage(){
        $serviceData = DB::table('service_tbl')
        ->join('servicetype_tbl','servicetype_tbl.serviceTypeID','=','service_tbl.serviceTypeID')
        ->select('*')
        ->where('service_tbl.serviceAvailability', 1)
        ->where('service_tbl.serviceStatus', 1)
        ->where('servicetype_tbl.serviceTypeStatus', 1)
        ->get();

        $addServiceData = DB::table('servicetype_tbl')
        ->select('*')
        ->where('serviceTypeStatus', 1)
        ->get();

        return View::make('/servicePage')->with('serviceData', $serviceData)->with('addServiceData', $addServiceData);
    }

    public function addService(){
       $serviceImage = ($_FILES["addServiceImage"]["name"]);
        if($serviceImage==null){
            $service = new service_tbl;
            $service->serviceName = Input::get('addServiceName');
            $service->serviceDescription = Input::get('addServiceDescription');
            $service->serviceFee = Input::get('addServiceFee');
            $service->serviceTypeID = Input::get('addServiceType');
            $service->serviceStatus = 1;
            $service->serviceAvailability = 1;
            $service->serviceImage = "No Image";
            $service->save();
            return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["addServiceImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["addServiceImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $service = new service_tbl;
            $service->serviceName = Input::get('addServiceName');
            $service->serviceDescription = Input::get('addServiceDescription');
            $service->serviceFee = Input::get('addServiceFee');
            $service->serviceTypeID = Input::get('addServiceType');
            $service->serviceStatus = 1;
            $service->serviceAvailability = 1;
            $service->serviceImage = $serviceImage;
            $service->save();

            Session::flash('title', 'Saved!');
            Session::flash('message', 'Service added succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        }
        // Check file size
        if ($_FILES["addServiceImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["addServiceImage"]["tmp_name"], $target_file)) {
            $service = new service_tbl;
            $service->serviceName = Input::get('addServiceName');
            $service->serviceDescription = Input::get('addServiceDescription');
            $service->serviceFee = Input::get('addServiceFee');
            $service->serviceTypeID = Input::get('addServiceType');
            $service->serviceStatus = 1;
            $service->serviceAvailability = 1;
            $service->serviceImage = $serviceImage;
            $service->save();

            Session::flash('title', 'Saved!');
            Session::flash('message', 'Service added succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
    }

    public function editService(){
        $serviceImage = ($_FILES["editServiceImage"]["name"]);
        if($serviceImage==null){
            $id = Input::get('editServiceID');
            $service = service_tbl::find($id); 
            $service->serviceName = Input::get('editServiceName');
            $service->serviceDescription = Input::get('editServiceDescription');
            $service->serviceFee = Input::get('editServiceFee');
            $service->serviceTypeID = Input::get('editServiceType');
            $service->save();
            return redirect()->back();
        }
        else{
        $target_dir = "img\\";
        $target_file = $target_dir . basename($_FILES["editServiceImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["editServiceImage"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $id = Input::get('editServiceID');
            $service = service_tbl::find($id); 
            $service->serviceName = Input::get('editServiceName');
            $service->serviceDescription = Input::get('editServiceDescription');
            $service->serviceFee = Input::get('editServiceFee');
            $service->serviceTypeID = Input::get('editServiceType');
            $service->serviceImage = $serviceImage;
            $service->save();

            Session::flash('title', 'Updated!');
            Session::flash('message', 'Service updated succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        }
        // Check file size
        if ($_FILES["editServiceImage"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["editServiceImage"]["tmp_name"], $target_file)) {
            $id = Input::get('editServiceID');
            $service = service_tbl::find($id); 
            $service->serviceName = Input::get('editServiceName');
            $service->serviceDescription = Input::get('editServiceDescription');
            $service->serviceFee = Input::get('editServiceFee');
            $service->serviceTypeID = Input::get('editServiceType');
            $service->serviceImage = $serviceImage;
            $service->save();

            Session::flash('title', 'Updated!');
            Session::flash('message', 'Service updated succesfully.');
            Session::flash('type', 'success');

            return redirect()->back();
        } else {
            return \Redirect::back();
        }
        }
        }
    }

    public function retrieveServiceData(){
        $ss = DB::table('service_tbl')
        ->select('*')
        ->where('serviceID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteservice(){
        $id = Input::get('deleteServiceID');
        $service = service_tbl::find($id); 
        $service->serviceStatus = 0;
        $service->save();

        Session::flash('title', 'Deleted!');
        Session::flash('message', 'Service deleted succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    //serviceType functions--------------------------------------------------------------------------->

    public function serviceTypePage(){
        $serviceTypeData = DB::table('servicetype_tbl')
        ->select('*')
        ->where('serviceTypeStatus', 1)->where('serviceTypeAvailability',1)
        ->get();
        return View::make('/serviceTypePage')->with('serviceTypeData', $serviceTypeData);
    }

    public function addServiceType(){
        $serviceType = new servicetype_tbl;
        $serviceType->serviceTypeName = Input::get('addServiceTypeName');
        // $serviceType->serviceTypeDescription = Input::get('addServiceTypeDescription');
        $serviceType->serviceTypeStatus = 1;
        $serviceType->serviceTypeAvailability = 1;
        $serviceType->save();

        Session::flash('title', 'Saved!');
        Session::flash('message', 'Service type added succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    public function editServiceType(){
        $id = Input::get('editServiceTypeID');
        $serviceType = servicetype_tbl::find($id); 
        $serviceType->serviceTypeName = Input::get('editServiceTypeName');
        // $serviceType->serviceTypeDescription = Input::get('editServiceTypeDesc');
        $serviceType->save();

        Session::flash('title', 'Updated!');
        Session::flash('message', 'Service type updated succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    public function retrieveServiceTypeData(){
        $ss = DB::table('servicetype_tbl')
        ->select('*')
        ->where('serviceTypeID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    public function deleteServiceType(){
        $id = Input::get('deleteServiceTypeID');
        $serviceType = servicetype_tbl::find($id); 
        $serviceType->serviceTypeStatus = 0;
        $serviceType->save();

        Session::flash('title', 'Deleted!');
        Session::flash('message', 'Service type deleted succesfully.');
        Session::flash('type', 'success');

        return redirect()->back();
    }

    public function retrieveUpcomingEvents(){
        $latestEvents = DB::table('reservation_tbl')
        ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        ->join('customer_tbl','customer_tbl.customerID','=','event_tbl.customerID')
        ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        ->join('payment_tbl', 'payment_tbl.reservationID','=','reservation_tbl.reservationID')
        ->join('transaction_tbl', 'transaction_tbl.reservationID', '=', 'reservation_tbl.reservationID')
        ->select('reservation_tbl.*','event_tbl.*','customer_tbl.*','package_tbl.*','transaction_tbl.*')
        ->distinct()
        ->where('reservation_tbl.reservationStatus', 2)
        ->where('payment_tbl.paymentStatus', 1)
        ->where('transaction_tbl.transactionStatus', '!=', 3)
        ->where('transaction_tbl.transactionStatus', '!=', 5)
        ->where('transaction_tbl.transactionStatus', '!=', 4)
        ->get();
        return \Response::json(['latestEvents'=>$latestEvents]);
    }

    public function dashboardPage(){
        $packageData = DB::table('package_tbl')
        ->where('packageStatus', 1)->where('packageAvailability',1)
        ->get();

        $dateTime = Date_create('now');
        $dateToday = $dateTime->format('n.j.Y');

        // Newest Reservations
        $dashboardData =  DB::table('reservation_tbl')
        ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        ->join('customer_tbl','event_tbl.customerID','=','customer_tbl.customerID')
        ->select('reservation_tbl.*','event_tbl.*','customer_tbl.*','package_tbl.*')
        ->orderBy('reservation_tbl.created_at', 'asc')
        ->where('reservation_tbl.created_at', '>=', $dateToday)
        ->where('reservation_tbl.reservationStatus', '=', 1)
        ->get();  

        // Upcoming or Ongoing Events

        // $latestEvents = DB::table('reservation_tbl')
        // ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        // ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        // ->join('customer_tbl','event_tbl.customerID','=','customer_tbl.customerID')
        // ->join('payment_tbl', 'payment_tbl.reservationID','=','reservation_tbl.reservationID')
        // ->join('transaction_tbl', 'transaction_tbl.reservationID', '=', 'reservation_tbl.reservationID')
        // ->select('reservation_tbl.*','event_tbl.*','customer_tbl.*','package_tbl.*','transaction_tbl.*')
        // ->distinct()
        // ->where('reservation_tbl.reservationStatus', 2)
        // ->where('payment_tbl.paymentStatus', 1)
        // ->where('transaction_tbl.transactionStatus', '!=', 3)
        // ->where('transaction_tbl.transactionStatus', '!=', 5)
        // ->where('transaction_tbl.transactionStatus', '!=', 4)
        // ->get();

        // Payments
        $latestPayments = DB::table('reservation_tbl')
        ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        ->join('customer_tbl','event_tbl.customerID','=','customer_tbl.customerID')
        ->join('transaction_tbl', 'transaction_tbl.reservationID', '=', 'reservation_tbl.reservationID')
        ->select('reservation_tbl.*','event_tbl.*','customer_tbl.*','package_tbl.*','transaction_tbl.*')
        ->where('transaction_tbl.transactionStatus', '!=', 3)
        ->where('transaction_tbl.transactionStatus', '!=', 4)
        ->where('transaction_tbl.transactionStatus', '!=', 1)
        ->where('reservation_tbl.reservationStatus', 2)
        ->get();
          
        return View::make('/dashboardPage')
        ->with('packageData',$packageData)
        ->with('dashboardData', $dashboardData)
        // ->with('latestEvents', $latestEvents)
        ->with('latestPayments', $latestPayments);
    }

    public function retrieveEventDetail(){
        $eventDetail = DB::table('reservation_tbl')
        ->join('transaction_tbl','transaction_tbl.reservationID','=','reservation_tbl.reservationID')
        ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        ->join('customer_tbl','event_tbl.customerID','=','customer_tbl.customerID')
        ->join('paymentterm_tbl','reservation_tbl.paymentTermID','=','paymentterm_tbl.paymentTermID')
        ->select('reservation_tbl.*','event_tbl.*','customer_tbl.*','package_tbl.*','paymentterm_tbl.*','transaction_tbl.*')
        ->where('reservation_tbl.reservationID', '=' , Input::get('sendReservationID'))
        ->get();
        return \Response::json(['eventDetail'=>$eventDetail]);
    }

    public function retrievePaymentDetail(){

        $paymentDetail = DB::table('payment_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','payment_tbl.reservationID')
        ->select('reservation_tbl.*', 'payment_tbl.*')
        ->where('reservation_tbl.reservationID', '=' , Input::get('reservationID'))
        ->orderBy('payment_tbl.paymentDueDate', 'asc')
        ->get();


        return \Response::json(['paymentDetail'=>$paymentDetail]);
    }

    public function submitPayment(){   
        $transactionID = Input::get('submitPaymentTransactionID');
        $paymentTermID = Input::get('submitPaymentTermID');
        $paymentID = Input::get('submitPaymentID');
        $paymentRDate = Input::get('submitPaymentReceiveDate');
        $paymentChecker = Input::get('submitPaymentChecker');
        if($paymentChecker == 1){
            $payment = payment_tbl::find($paymentID);
            $payment->paymentReceiveDate = $paymentRDate;
            $payment->paymentStatus = 1;
            $payment->save();
                if($paymentTermID == 1){
                    $transaction = transaction_tbl::find($transactionID);
                    $transaction->transactionStatus = 1;
                    $transaction->save();
                }
                if($paymentTermID == 2){
                    $transaction = transaction_tbl::find($transactionID);
                    $transaction->transactionStatus = 2;
                    $transaction->save();
                }
                if($paymentTermID == 3){
                    $transaction = transaction_tbl::find($transactionID);
                    $transaction->transactionStatus = 2;
                    $transaction->save();
                }
        }
        if($paymentChecker == 2){
            $paymentFee = Input::get('submitPaymentFee');
            $transactionFee = Input::get('submitTransactionFee');
            $totalFee = $paymentFee + $transactionFee;
                $payment = payment_tbl::find($paymentID);
                $payment->paymentReceiveDate = $paymentRDate;
                $payment->paymentStatus = 1;
                $payment->save();
                    if($paymentTermID == 1){
                        $transaction = transaction_tbl::find($transactionID);
                        $transaction->transactionStatus = 4;
                        $transaction->totalFee = $totalFee;
                        $transaction->save();
                    }
                    if($paymentTermID == 2){
                        $transaction = transaction_tbl::find($transactionID);
                        $transaction->transactionStatus = 1;
                        $transaction->save();
                    }
                    if($paymentTermID == 3){
                        $transaction = transaction_tbl::find($transactionID);
                        $transaction->transactionStatus = 1;
                        $transaction->save();
                    }
        }
        if($paymentChecker == 3){
            $paymentFee = Input::get('submitPaymentFee');
            $transactionFee = Input::get('submitTransactionFee');
            $totalFee = $paymentFee + $transactionFee;
                $payment = payment_tbl::find($paymentID);
                $payment->paymentReceiveDate = $paymentRDate;
                $payment->paymentStatus = 1;
                $payment->save();
                    $transaction = transaction_tbl::find($transactionID);
                    $transaction->transactionStatus = 4;
                    $transaction->totalFee = $totalFee;
                    $transaction->save();
        }
        return redirect()->back();
    }

    public function savePayment0()
    {   
        // Save to Payment_tbl
        $transactionID = Input::get('sendTransactionID');
        $paymentTermID = Input::get('sendPaymentTerm');
        $paymentID = Input::get('sendPaymentID');
        $paymentRDate = Input::get('sendReceiveDate');
        $payment = payment_tbl::find($paymentID);
        $payment->paymentReceiveDate = $paymentRDate;
        $payment->paymentStatus = 1;
        $payment->save();

        if($paymentTermID == 1){
            $transaction = transaction_tbl::find($transactionID);
            $transaction->transactionStatus = 2;
            $transaction->save();
        }
        if($paymentTermID == 2){
            $transaction = transaction_tbl::find($transactionID);
            $transaction->transactionStatus = 2;
            $transaction->save();
        }
        if($paymentTermID == 3){
            $transaction = transaction_tbl::find($transactionID);
            $transaction->transactionStatus = 2;
            $transaction->save();
        }
        // Save to Transaction_tbl
        return redirect()->back();
    }

    public function savePayment(){
        $transactionID = Input::get('sendTransactionID');
        $paymentTermID = Input::get('sendPaymentTerm');
        $paymentID = Input::get('sendPaymentID');
        $paymentRDate = Input::get('sendReceiveDate');
        $checker = Input::get('sendChecker');
        $paymentFee = Input::get('sendPaymentFee');
        $transactionFee = Input::get('sendTransactionFee');
        if($paymentTermID == 1){ //Full Payment
            if($checker == 1){ //First Payment
                $payment = payment_tbl::find($paymentID);
                $payment->paymentReceiveDate = $paymentRDate;
                $payment->paymentStatus = 1;
                $payment->save();
                    $transaction = transaction_tbl::find($transactionID);
                    $transaction->transactionStatus = 2;
                    $transaction->save();
            }
            if($checker == 2){ //Second Payment: Additional
                $totalFee = $paymentFee + $transactionFee;
                $payment = payment_tbl::find($paymentID);
                $payment->paymentReceiveDate = $paymentRDate;
                $payment->paymentStatus = 1;
                $payment->save();
                    $transaction = transaction_tbl::find($transactionID);
                    $transaction->transactionStatus = 4;
                    $transaction->totalFee = $totalFee;
                    $transaction->save();
            }
        }
        if($paymentTermID == 2 || $paymentTermID == 3){ //Half or 70-30
            if($checker == 3){ //First Payment
                $payment = payment_tbl::find($paymentID);
                $payment->paymentReceiveDate = $paymentRDate;
                $payment->paymentStatus = 1;
                $payment->save();
                    $transaction = transaction_tbl::find($transactionID);
                    $transaction->transactionStatus = 3;
                    $transaction->save();
            }
            if($checker == 4){ //Second Payment
                $payment = payment_tbl::find($paymentID);
                $payment->paymentReceiveDate = $paymentRDate;
                $payment->paymentStatus = 1;
                $payment->save();
                    $transaction = transaction_tbl::find($transactionID);
                    $transaction->transactionStatus = 2;
                    $transaction->save();
            }
            if($checker == 5){ //Additional Payment
                $payment = payment_tbl::find($paymentID);
                $payment->paymentReceiveDate = $paymentRDate;
                $payment->paymentStatus = 1;
                $payment->save();
                $totalFee = $paymentFee + $transactionFee;
                    $transaction = transaction_tbl::find($transactionID);
                    $transaction->transactionStatus = 4;
                    $transaction->totalFee = $totalFee;
                    $transaction->save();
            }
        }
    }

    public function savePayment1()
    {
        $paymentID = Input::get('sendPaymentID');
        $paymentTermID = Input::get('sendPaymentTerm');
        $paymentRDate = Input::get('sendReceiveDate');
        $transactionID = Input::get('sendTransactionID');
        $paymentFee = Input::get('sendPaymentFee');
        $transactionFee = Input::get('sendTransactionFee');
        $totalFee = $paymentFee + $transactionFee;

        $payment = payment_tbl::find($paymentID);
        $payment->paymentReceiveDate = $paymentRDate;
        $payment->paymentStatus = 1;
        $payment->save();
        // dd($paymentTermID);

        if($paymentTermID == 1){
            $transaction = transaction_tbl::find($transactionID);
            $transaction->transactionStatus = 4;
            $transaction->totalFee = $totalFee;
            $transaction->save();
        }

        if($paymentTermID == 2){
            $transaction = transaction_tbl::find($transactionID);
            $transaction->transactionStatus = 1;
            $transaction->save();
        }

        if($paymentTermID == 3){
            $transaction = transaction_tbl::find($transactionID);
            $transaction->transactionStatus = 1;
            $transaction->save();
        }
        
        return redirect()->back();
    }

    public function savePayment2()
    {
        $paymentID = Input::get('sendPaymentID');
        $paymentRDate = Input::get('sendReceiveDate');
        $transactionID = Input::get('sendTransactionID');
        $paymentFee = Input::get('sendPaymentFee');
        $transactionFee = Input::get('sendTransactionFee');
        $payment = payment_tbl::find($paymentID);
        $payment->paymentReceiveDate = $paymentRDate;
        $payment->paymentStatus = 1;
        $payment->save();
        $totalFee = $paymentFee + $transactionFee;

        $transaction = transaction_tbl::find($transactionID);
        $transaction->transactionStatus = 4;
        $transaction->totalFee = $totalFee;
        $transaction->save();
        return redirect()->back();
    }

    public function assignEquipment()
    {
        //Find Package
        $checkReservationID = Input::get('assignEquipmentReservationID');
        $checkPackageID = Input::get('assignEquipmentPackageID');
        $checkEventID = Input::get('assignEquipmentEventID');
        $addItemCtr = Input::get('addItemCtr');
        $additionalItemCtr = Input::get('additionalItemCtr');

        for ($i=0; $i < $addItemCtr; $i++) {
            $equipmentQtyName = "addItemQtyID" . $i;
            $equipmentIDName = "addItemID" . $i;
            $equipmentAlert = Input::get($equipmentQtyName);
            $assignEquipment = new assignequipment_tbl;
            $assignEquipment->assignEquipmentQty = Input::get($equipmentQtyName);
            $assignEquipment->assignReturnQty = 0;
            $assignEquipment->assignEquipmentDate = Date_create('now');
            $assignEquipment->assignEquipmentStatus = 1;
            $assignEquipment->equipmentID = Input::get($equipmentIDName);
            $assignEquipment->reservationID = $checkReservationID;
            $assignEquipment->save();
            $equipmentlog = new equipmentlog_tbl;
            $equipmentlog->equipmentID = Input::get($equipmentIDName);
            $equipmentlog->equipmentQuantityIn = (Input::get($equipmentQtyName)) * -1;
            $equipmentlog->equipmentQuantityOut = Input::get($equipmentQtyName);
            $equipmentlog->equipmentLogDate = Date_create('now');
            $equipmentlog->save();
            $event = event_tbl::find($checkEventID);
            $event->eventStatus = 2;
            $event->save();
        }

        for ($i=0; $i < $additionalItemCtr ; $i++) {
            $equipmentQtyName = "additionalItemQtyID" . $i;
            $equipmentIDName = "additionalItemID" . $i;
            $assignEquipment = new assignequipment_tbl;
            $assignEquipment->assignEquipmentQty = Input::get($equipmentQtyName);
            $assignEquipment->assignReturnQty = 0;
            $assignEquipment->assignEquipmentDate = Date_create('now');
            $assignEquipment->assignEquipmentStatus = 1;
            $assignEquipment->equipmentID = Input::get($equipmentIDName);
            $assignEquipment->reservationID = $checkReservationID;
            $assignEquipment->save();
            $equipmentlog = new equipmentlog_tbl;
            $equipmentlog->equipmentID = Input::get($equipmentIDName);
            $equipmentlog->equipmentQuantityIn = (Input::get($equipmentQtyName)) * -1;
            $equipmentlog->equipmentQuantityOut = Input::get($equipmentQtyName);
            $equipmentlog->equipmentLogDate = Date_create('now');
            $equipmentlog->save();
        }
        return redirect()->back();
    }

    public function assessEquipment()
    {
        //Find Package
        $checkReservationID = Input::get('assessmentModalReservationID');
        $checkTransactionID = Input::get('assessmentTransactionID');
        $checkPackageID = Input::get('assessmentModalPackageID');
        $itemCtr = Input::get('assessmentItemCtr');
        $additionalPayment = Input::get('assessmentAdditionalPayment');
        // dd($additionalPayment);
        if($additionalPayment == 0){
            for ($i=0; $i < $itemCtr ; $i++) {
                $returnQty = "assessReturnQty" . $i;
                $returnQtyValue = Input::get($returnQty);
                $returnID = "assessItemID" . $i;
                $returnIDValue = Input::get($returnID);
                $assessment = assignequipment_tbl::find($returnIDValue);
                $assessment->assignReturnQty = $returnQtyValue;
                $assessment->save();
                // Equipmentlog_tbl
                $returnEquipment = "assessEquipmentNameID" . $i;
                $returnEquipmentValue = Input::get($returnEquipment);
                $equipmentlog = new equipmentlog_tbl;
                $equipmentlog->equipmentID = $returnEquipmentValue;
                $equipmentlog->equipmentQuantityIn = $returnQtyValue;
                $equipmentlog->equipmentQuantityOut = $returnQtyValue * -1;
                $equipmentlog->equipmentLogDate = Date_create('now');
                $equipmentlog->save();
            }
            // Transaction_tbl
            $transaction = transaction_tbl::find($checkTransactionID);
            $transaction->transactionStatus = 4;
            $transaction->save();
        }
        if($additionalPayment>0){
            for ($i=0; $i < $itemCtr ; $i++) {
                $returnQty = "assessReturnQty" . $i;
                $returnQtyValue = Input::get($returnQty);
                $returnID = "assessItemID" . $i;
                $returnIDValue = Input::get($returnID);
                $assessment = assignequipment_tbl::find($returnIDValue);
                $assessment->assignReturnQty = $returnQtyValue;
                $assessment->save();
                // Equipmentlog_tbl
                $returnEquipment = "assessEquipmentNameID" . $i;
                $returnEquipmentValue = Input::get($returnEquipment);
                $equipmentlog = new equipmentlog_tbl;
                $equipmentlog->equipmentID = $returnEquipmentValue;
                $equipmentlog->equipmentQuantityIn = $returnQtyValue;
                $equipmentlog->equipmentQuantityOut = $returnQtyValue * -1;

                $NewDate=Date('y:m:d', strtotime("+3 days"));
                $equipmentlog->equipmentLogDate = $NewDate;
                $equipmentlog->save();
            }
            // Transaction__tbl
            $transaction = transaction_tbl::find($checkTransactionID);
            $transaction->transactionStatus = 5;
            $transaction->save();
            // Payment_tbl
            $plusOneWeek = strtotime("+7 day");
            $firstPaymentDate = date('Y-m-d', $plusOneWeek);
            $paymenttbl = new payment_tbl;
            $paymenttbl->paymentDueDate = $firstPaymentDate;
            $paymenttbl->paymentStatus = 0;
            $paymenttbl->reservationID = $checkReservationID;
            $paymenttbl->paymentAmount = $additionalPayment;
            $paymenttbl->save();
        }
        
        return redirect()->back();
    }

    public function retrieveAssignedEquipment(){

       $ss = DB::table('assignequipment_tbl')
        ->join('equipment_tbl','equipment_tbl.equipmentID','=','assignequipment_tbl.equipmentID')
        ->select('assignequipment_tbl.*', 'equipment_tbl.*')
        ->where('assignequipment_tbl.reservationID', Input::get('sendReservationID'))
        ->get();
        // dd($ss);
        return \Response::json(['ss'=>$ss]);
    }

    //Schedule function------------------------------------------------------------------------------>
    

    public function retrieveScheduleData(Request $request){
        $rsvtn = DB::table('reservation_tbl')
        ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        ->join('customer_tbl','event_tbl.customerID','=','customer_tbl.customerID')
        ->join('transaction_tbl', 'transaction_tbl.reservationID', '=', 'reservation_tbl.reservationID')
        ->select('reservation_tbl.*','event_tbl.*','customer_tbl.*','package_tbl.*','transaction_tbl.*')
        ->where('transaction_tbl.transactionStatus', '!=', 3)
        ->where('reservation_tbl.reservationStatus', '=', 2)
        ->get();
        return \Response::json(['rsvtn'=>$rsvtn]);
    }

    //Reservation function------------------------------------------------------------------------------>

    public function reservationPage(){
        $reservationData = DB::table('reservation_tbl')
        ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        ->join('customer_tbl','event_tbl.customerID','=','customer_tbl.customerID')
        ->leftjoin('location_tbl', 'location_tbl.locationID', '=', 'event_tbl.locationID')
        ->select('reservation_tbl.*','event_tbl.*','customer_tbl.*','package_tbl.*', 'location_tbl.*')
        ->where('reservation_tbl.reservationStatus', '=', 1)
        ->get();    

        $addReservationData = DB::table('package_tbl')
        ->select('*')
        ->where('packageStatus', 1)
        ->get();

        return View::make('/transaction_reservationPage')
        ->with('reservationData', $reservationData)
        ->with('addReservationData', $addReservationData);
    }

    public function retrieveReservationData(){
       $ss = DB::table('reservation_tbl')
        ->join('event_tbl','reservation_tbl.eventID','=','event_tbl.eventID')
        ->join('package_tbl','reservation_tbl.packageID','=','package_tbl.packageID')
        ->join('customer_tbl','event_tbl.customerID','=','customer_tbl.customerID')
        ->select('event_tbl.*', 'package_tbl.*', 'customer_tbl.*', 'reservation_tbl.*')
        ->where('reservation_tbl.reservationStatus', 1)
        ->get();

        return \Response::json(['ss'=>$ss]);

    }

    public function retrieveReservationId(){
       $ss = DB::table('reservation_tbl')
        ->where('reservationID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);

    }
    public function editReservation(){
        $eventID = DB::table('reservation_tbl')
        ->where('reservationID',Input::get('editReservationID'))
        ->pluck('eventID');
        $event = event_tbl::find($eventID[0]);
        $event->eventDate = Input::get('editReservationDate');
        $event->save();


        $id = Input::get('editReservationID');
        $reservation = reservation_tbl::find($id);
        $reservation->packageID = Input::get('editReservationPackage');
        $reservation->save();
        return redirect()->back();
    }

    //Inventory Dish
    public function inventoryDishPage(){
        $dishData = DB::table('dish_tbl')->join('dishtype_tbl','dishtype_tbl.dishTypeID','=','dish_tbl.dishTypeID')
        ->select('*')
        ->where('dish_tbl.dishStatus', 1)
        ->get();

        $addDishData = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeStatus', 1)
        ->get();

        return View::make('/inventory_dishPage')->with('dishData', $dishData)->with('addDishData', $addDishData);
    }

    public function disableDish(){
        $id = Input::get('disableDishID');
        $inventoryDish = dish_tbl::find($id); 
        $inventoryDish->dishAvailability = 0; 
        $inventoryDish->save();
        return redirect()->back();
    }

    public function enableDish(){
        $id = Input::get('enableDishID');
        $inventoryDish = dish_tbl::find($id); 
        $inventoryDish->dishAvailability = 1; 
        $inventoryDish->save();
        return redirect()->back();
    }

    public function retrieveInventoryDishID(){
        $ss = DB::table('dish_tbl')
        ->select('*')
        ->where('dishID', Input::get('sdid'))
        ->get();
        return \Response::json(['ss'=>$ss]);
    }

    //Inventory Equipment

    public function enableEquipment(){
        $id = Input::get('enableEquipmentID');
        $inventoryEquipment = equipment_tbl::find($id); 
        $inventoryEquipment->equipmentAvailability   = 1; 
        $inventoryEquipment->save();
        return redirect()->back();
    }

    public function disableEquipment(){
        $id = Input::get('disableEquipmentID');
        $inventoryEquipment = equipment_tbl::find($id); 
        $inventoryEquipment->equipmentAvailability = 0; 
        $inventoryEquipment->save();
        return redirect()->back();
    }

    public function addEquipmentUnit(){
        $id = Input::get('id');
        $addQuantityInput = Input::get('addQuantity');
        $minusQuantityInput = Input::get('minusQuantity');
        $equipmentlog = new equipmentlog_tbl;
        $equipmentlog->equipmentID = $id;
        $equipmentlog->equipmentQuantityIn = $addQuantityInput;
        $equipmentlog->equipmentQuantityOut = $minusQuantityInput;
        $equipmentlog->equipmentLogDate = Date_create('now');
        $equipmentlog->save();

    }

    //Inventory Location
    public function inventoryLocationPage(){
        $locationData = DB::table('location_tbl')
        ->select('*')
        ->where('locationStatus', 1)
        ->get();
        return View::make('/inventory_locationPage')->with('locationData', $locationData);
    }

    public function enableLocation(){
        $id = Input::get('enableLocationID');
        $inventoryLocation = location_tbl::find($id); 
        $inventoryLocation->locationAvailability = 1; 
        $inventoryLocation->save();
        return redirect()->back();
    }


    public function disableLocation(){
        $id = Input::get('disableLocationID');
        $inventoryLocation = location_tbl::find($id); 
        $inventoryLocation->locationAvailability = 0; 
        $inventoryLocation->save();
        return redirect()->back();
    }

    //Transaction Page 
    public function transactionPage(){
        $rejectedReservations =  DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl','customer_tbl.customerID','=','event_tbl.customerID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','customer_tbl.*')
        ->where('reservation_tbl.reservationStatus', '!=', 1)
        ->get();  
        return View::make('/transactionPage')
        ->with('rejectedReservations', $rejectedReservations);
    }

    public function retrieveTransactionData(){
        $transactionData =  DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl','customer_tbl.customerID','=','event_tbl.customerID')
        ->join('package_tbl', 'package_tbl.packageID','=','reservation_tbl.packageID')
        ->join('paymentterm_tbl', 'paymentterm_tbl.paymentTermID','=','reservation_tbl.paymentTermID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','customer_tbl.*', 'package_tbl.*', 'paymentterm_tbl.*')
        ->where('transaction_tbl.transactionID', Input::get('getId'))
        ->get();
        return \Response::json(['tdata'=>$transactionData]);
    }

    public function getTransactionData(){
        $transactionDetails =  DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('package_tbl', 'package_tbl.packageID','=','reservation_tbl.packageID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','package_tbl.*')
        ->where('transaction_tbl.transactionID', Input::get('transacId'))
        ->get();
        return \Response::json(['transactionDetails'=>$transactionDetails]);
    }


    public function cancelEvent(){
        $transactionID = Input::get('cancelEventTransactionId');
        $transaction = transaction_tbl::find($transactionID); 
        $transaction->transactionStatus = 3; 
        $transaction->save();
        return redirect()->back();

    }
    
    public function queryPage(){
        $cancellation = DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl', 'customer_tbl.customerID','=','event_tbl.customerID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','customer_tbl.*')
        ->where('transaction_tbl.transactionStatus', 3)
        ->get();

        $return = DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl', 'customer_tbl.customerID','=','event_tbl.customerID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','customer_tbl.*')
        ->where('customer_tbl.customerAvailability', 0)
        ->get();

        $lost = DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl', 'customer_tbl.customerID','=','event_tbl.customerID')
        ->join('assignequipment_tbl', 'assignequipment_tbl.reservationID', '=','reservation_tbl.reservationID')
        ->join('equipment_tbl', 'assignequipment_tbl.equipmentID', '=','equipment_tbl.equipmentID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','customer_tbl.*','equipment_tbl.*','assignequipment_tbl.*')
        ->where('transaction_tbl.transactionStatus', 4)
        ->orWhere('transaction_tbl.transactionStatus', 5)
        ->get();

        $assign = DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl', 'customer_tbl.customerID','=','event_tbl.customerID')
        ->join('assignequipment_tbl', 'assignequipment_tbl.reservationID', '=','reservation_tbl.reservationID')
        ->join('equipment_tbl', 'assignequipment_tbl.equipmentID', '=','equipment_tbl.equipmentID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','customer_tbl.*','equipment_tbl.*','assignequipment_tbl.*')
        ->where('event_tbl.eventStatus', 2)
        ->where('transaction_tbl.transactionStatus', '!=', 4)
        ->get();

        return View::make('/QueryPage')->with('cancellation', $cancellation)->with('lost', $lost)->with('assign', $assign)->with('return', $return);
    }

    public function queryLost(){
         $lost = DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl', 'customer_tbl.customerID','=','event_tbl.customerID')
        ->where('transaction_tbl.transactionStatus', 4)
        ->orWhere('transaction_tbl.transactionStatus', 5)
        ->where('event_tbl.eventStatus', 2)
        ->get();

        
        return \Response::json(['lost'=>$lost]);
    }
    public function queryAssign(){
         $assign = DB::table('transaction_tbl')
       ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl', 'customer_tbl.customerID','=','event_tbl.customerID')
        ->join('assignequipment_tbl', 'assignequipment_tbl.reservationID', '=','reservation_tbl.reservationID')
        ->where('transaction_tbl.transactionStatus', '!=', 4)
        ->orWhere('transaction_tbl.transactionStatus', '!=',5)
        ->where('event_tbl.eventStatus', 2)
        ->get();

        
        return \Response::json(['assign'=>$assign]);
    }
    public function queryLost2(){
         $lost2 = DB::table('transaction_tbl')
        ->join('reservation_tbl','reservation_tbl.reservationID','=','transaction_tbl.reservationID')
        ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
        ->join('customer_tbl', 'customer_tbl.customerID','=','event_tbl.customerID')
        ->join('assignequipment_tbl', 'assignequipment_tbl.reservationID', '=','reservation_tbl.reservationID')
        ->join('equipment_tbl', 'assignequipment_tbl.equipmentID', '=','equipment_tbl.equipmentID')
        ->select('transaction_tbl.*', 'reservation_tbl.*','event_tbl.*','customer_tbl.*','equipment_tbl.*','assignequipment_tbl.*')
        ->where('transaction_tbl.transactionStatus', 4)
        ->where('customer_tbl.customerID', Input::get('csid'))
        ->get();

        return \Response::json(['lost2'=>$lost2]);
    }
    //VALIDATIONS
    ////DISH TYPE
    public function validateDishTypeName(){
        $avail = DB::table('dishtype_tbl')
            ->where('dishTypeName', Input::get('addDishTypeName'))
            ->count();
        // dd($avail);
        if($avail == 0)
        {
            $isAvailable = true;
            echo json_encode(array(
            'valid' => $isAvailable
            ));
        }else{
            $isAvailable = False;
            echo json_encode(array(
            'valid' => $isAvailable
            ));
        }
    }
      

}
