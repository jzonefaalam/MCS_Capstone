<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Response;

use App\dishadditional_tbl;
use App\serviceadditional_tbl;
use App\equipmentadditional_tbl;
use App\employeeadditional_tbl;
use App\dish_tbl;
use App\dishtype_tbl;
use App\customer_tbl;
use App\contact_tbl;
use App\employeetype_tbl;
use App\employee_tbl;
use App\equipment_tbl;
use App\event_tbl;
use App\eventtype_tbl;
use App\location_tbl;
use App\package_tbl;
use App\service_tbl;
use App\reservation_tbl;
use App\dishavailed_tbl;
use App\serviceavailed_tbl;
use App\equipmentavailed_tbl;
use App\employeeemployed_tbl;

class userController extends Controller
{
    public function homePage(){
    	$dishData = DB::table('dish_tbl')->join('dishtype_tbl','dishtype_tbl.dishTypeID','=','dish_tbl.dishTypeID')
        ->select('*')
    	->where('dish_tbl.dishAvailability', 1)->where('dish_tbl.dishStatus', 1)
    	->get();

    	$addDishData = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeStatus', 1)
        ->get();

        $dishDataID = DB::table('dish_tbl')->max('dishID');

        $dishNewID = $dishDataID + 1;
        return View::make('/UserHomePage')->with('dishData', $dishData)->with('addDishData', $addDishData)->with('dishNewID', $dishNewID);
    }

    public function userEquipPage(){
        $equipment = DB::table('equipment_tbl') 
                    ->join('equipmenttype_tbl','equipment_tbl.equipmentTypeID','=','equipmenttype_tbl.equipmentTypeID')
                    ->where('equipment_tbl.equipmentStatus', 1)
                    ->where('equipment_tbl.equipmentAvailability', 1)
                    ->get();

        $equipmenttype = DB::table('equipmenttype_tbl') 
                    ->where('equipmenttype_tbl.equipmentTypeStatus', 1)
                    ->get();
        return View::make('/UserEquipmentPage')->with('equipmenttype', $equipmenttype)->with('equipment', $equipment);
    }

    public function userPackPage(){
        $package = DB::table('package_tbl')
                    ->where('package_tbl.packageStatus', 1)
                    ->orderBy('package_tbl.packageName')
                    ->get();

        $packageinclusion = DB::table('packageinclusion_tbl')
                    ->join('dishtype_tbl','packageinclusion_tbl.dishTypeID','=','dishtype_tbl.dishTypeID')
                    ->join('package_tbl','packageinclusion_tbl.packageID','=','package_tbl.packageID')
                    ->where('packageinclusion_tbl.packageInclusionStatus', '=', 1) 
                    ->select('packageinclusion_tbl.*','package_tbl.*','dishtype_tbl.*')
                    ->get();

        $serviceinclusion = DB::table('packageinclusion_tbl')
                    ->join('service_tbl','packageinclusion_tbl.serviceID','=','service_tbl.serviceID')
                    ->join('package_tbl','packageinclusion_tbl.packageID','=','package_tbl.packageID')
                    ->where('packageinclusion_tbl.packageInclusionStatus', '=', 1) 
                    ->select('packageinclusion_tbl.*','package_tbl.*','service_tbl.*')
                    ->get();

        $equipmentinclusion = DB::table('packageinclusion_tbl')
                    ->join('equipment_tbl','packageinclusion_tbl.equipmentID','=','equipment_tbl.equipmentID')
                    ->join('package_tbl','packageinclusion_tbl.packageID','=','package_tbl.packageID')
                    ->where('packageinclusion_tbl.packageInclusionStatus', '=', 1) 
                    ->select('packageinclusion_tbl.*','package_tbl.*','equipment_tbl.*')
                    ->get();

        $employeeinclusion = DB::table('packageinclusion_tbl')
                    ->join('employeetype_tbl','packageinclusion_tbl.employeeTypeID','=','employeetype_tbl.employeeTypeID')
                    ->join('package_tbl','packageinclusion_tbl.packageID','=','package_tbl.packageID')
                    ->where('packageinclusion_tbl.packageInclusionStatus', '=', 1) 
                    ->select('packageinclusion_tbl.*','package_tbl.*','employeeType_tbl.*')
                    ->get();

        return View::make('/UserPackagePage')->with('package', $package)->with('packageinclusion', $packageinclusion)->with('serviceinclusion', $serviceinclusion)->with('equipmentinclusion', $equipmentinclusion)->with('employeeinclusion', $employeeinclusion);
    }

    public function userDishPage(){
        $dishtype = DB::table('dishtype_tbl')
                    ->where('dishtype_tbl.dishTypeStatus', 1)
                    ->get();            

        $dishes = DB::table('dish_tbl')
                    ->join('dishtype_tbl','dish_tbl.dishTypeID','=','dishtype_tbl.dishTypeID')
                    ->get();
        return View::make('/UserDishPage')->with('dishtype', $dishtype)->with('dishes', $dishes);
    }

    public function userServPage(){
       $service = DB::table('service_tbl')
                    ->join('servicetype_tbl','service_tbl.serviceTypeID','=','servicetype_tbl.serviceTypeID')
                    ->get();

        $servicetype = DB::table('servicetype_tbl')
                    ->where('servicetype_tbl.serviceTypeStatus', 1)
                    ->where('servicetype_tbl.serviceTypeAvailability', 1)
                    ->get();
        return View::make('/UserServicePage')->with('service', $service)->with('servicetype', $servicetype);
    }

    public function reservationPage(){
        $dishData = DB::table('dish_tbl')->join('dishtype_tbl','dishtype_tbl.dishTypeID','=','dish_tbl.dishTypeID')
        ->select('*')
        ->where('dish_tbl.dishAvailability', 1)->where('dish_tbl.dishStatus', 1)
        ->get();

        $addDishData = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeStatus', 1)
        ->get();

        $dishDataID = DB::table('dish_tbl')->max('dishID');

        //dagdagkoto
        $eType = DB::table('eventtype_tbl')
                  ->where('eventtype_tbl.eventTypeStatus', '=', '1')
                  ->get();

        $dishNewID = $dishDataID + 1;

        $maxCustomerID = DB::table('customer_tbl')->max('customerID');

        $customerNewID = $maxCustomerID + 1;

        $maxContactID = DB::table('contact_tbl')->max('contactID');

        $contactNewID = $maxContactID + 1;

        $maxEventID = DB::table('event_tbl')->max('eventID');

        $eventNewID = $maxEventID + 1;

        $maxDishAvailedID = DB::table('dishavailed_tbl')->max('dishAvailedID');

        $dishAvailedNewID = $maxDishAvailedID + 1;

        $maxReservationID = DB::table('reservation_tbl')->max('reservationID');

        $reservationNewID = $maxReservationID + 1;

        $countDish = DB::table('packageinclusion_tbl')->count('packageInclusionID');
        $countPckg = DB::table('package_tbl')->count('packageID');

        $package = DB::table('package_tbl')
                    ->where('package_tbl.packageStatus', 1)
                    ->orderBy('package_tbl.packageName')
                    ->get();

        $packageinclusion = DB::table('packageinclusion_tbl')
                    ->join('dishtype_tbl','packageinclusion_tbl.dishTypeID','=','dishtype_tbl.dishTypeID')
                    ->join('package_tbl','packageinclusion_tbl.packageID','=','package_tbl.packageID')
                    ->where('packageinclusion_tbl.packageInclusionStatus', '=', 1) 
                    ->select('packageinclusion_tbl.*','package_tbl.*','dishtype_tbl.*')
                    ->get();

        $serviceinclusion = DB::table('packageinclusion_tbl')
                    ->join('service_tbl','packageinclusion_tbl.serviceID','=','service_tbl.serviceID')
                    ->join('package_tbl','packageinclusion_tbl.packageID','=','package_tbl.packageID')
                    ->where('packageinclusion_tbl.packageInclusionStatus', '=', 1) 
                    ->select('packageinclusion_tbl.*','package_tbl.*','service_tbl.*')
                    ->get();

        $equipmentinclusion = DB::table('packageinclusion_tbl')
                    ->join('equipment_tbl','packageinclusion_tbl.equipmentID','=','equipment_tbl.equipmentID')
                    ->join('package_tbl','packageinclusion_tbl.packageID','=','package_tbl.packageID')
                    ->where('packageinclusion_tbl.packageInclusionStatus', '=', 1) 
                    ->select('packageinclusion_tbl.*','package_tbl.*','equipment_tbl.*')
                    ->get();

        $employeeinclusion = DB::table('packageinclusion_tbl')
                    ->join('employeetype_tbl','packageinclusion_tbl.employeeTypeID','=','employeetype_tbl.employeeTypeID')
                    ->join('package_tbl','packageinclusion_tbl.packageID','=','package_tbl.packageID')
                    ->where('packageinclusion_tbl.packageInclusionStatus', '=', 1)
                    ->select('packageinclusion_tbl.*','package_tbl.*','employeeType_tbl.*')
                    ->get();

        $dishtype = DB::table('dishtype_tbl')
                    ->where('dishtype_tbl.dishTypeStatus', 1)
                    ->get();            

        $dishes = DB::table('dish_tbl')
                    ->join('dishtype_tbl','dish_tbl.dishTypeID','=','dishtype_tbl.dishTypeID')
                    ->get();

        $service = DB::table('service_tbl')
                    ->join('servicetype_tbl','service_tbl.serviceTypeID','=','servicetype_tbl.serviceTypeID')
                    ->get();

        $servicetype = DB::table('servicetype_tbl')
                    ->where('servicetype_tbl.serviceTypeStatus', 1)
                    ->where('servicetype_tbl.serviceTypeAvailability', 1)
                    ->get();

        $equipment = DB::table('equipment_tbl') 
                    ->where('equipment_tbl.equipmentStatus', 1)
                    ->where('equipment_tbl.equipmentAvailability', 1)
                    ->get();

        $equipmenttype = DB::table('equipmenttype_tbl') 
                    ->where('equipmenttype_tbl.equipmentTypeStatus', 1)
                    ->get();

        $employeetype = DB::table('employeetype_tbl') 
                    ->where('employeetype_tbl.employeeTypeStatus', 1)
                    ->get();

        $location = DB::table('location_tbl') 
                    ->where('location_tbl.locationStatus', 1)
                    ->where('location_tbl.locationAvailability', 1)
                    ->get();

        $customer = DB::table('customer_tbl') 
                    ->where('customer_tbl.customerStatus', 0)
                    ->get();

        $paymentMode = DB::table('paymentmode_tbl') 
                    ->get();

        $paymentTerm = DB::table('paymentterm_tbl') 
                    ->get();
        
        
           
        return View::make('/UserReservationPage')->with('dishData', $dishData)->with('addDishData', $addDishData)->with('dishNewID', $dishNewID)->with('eventNewID', $eventNewID)->with('reservationNewID', $reservationNewID)->with('contactNewID', $contactNewID)->with('dishAvailedNewID', $dishAvailedNewID)->with('eType', $eType)->with('customerNewID', $customerNewID)->with('package', $package)->with('packageinclusion', $packageinclusion)->with('serviceinclusion', $serviceinclusion)->with('equipmentinclusion', $equipmentinclusion)->with('employeeinclusion', $employeeinclusion)->with('dishtype', $dishtype)->with('dishes', $dishes)->with('service', $service)->with('servicetype', $servicetype)->with('equipment', $equipment)->with('equipmenttype', $equipmenttype)->with('employeetype', $employeetype)->with('location',$location)->with('customer',$customer)->with('countDish', $countDish)->with('countPckg', $countPckg)->with('paymentMode', $paymentMode)->with('paymentTerm', $paymentTerm);

    }

    public function getPIID(Request $request){
      $pckid = DB::table('package_tbl')
              ->where('package_tbl.packageStatus', 1)
              ->get();
      $pckgid = DB::table('packageinclusion_tbl')
              ->join('package_tbl','package_tbl.packageID','=','packageinclusion_tbl.packageID')
              ->join('dishtype_tbl','packageinclusion_tbl.dishTypeID','=','dishtype_tbl.dishTypeID')
              // ->join('dish_tbl','dish_tbl.dishTypeID','=','dishtype_tbl.dishTypeID')
              ->where('packageinclusion_tbl.packageID', '=', $request->input('pg_id'))
              ->get();
      $servid = DB::table('packageinclusion_tbl')
              ->join('package_tbl','package_tbl.packageID','=','packageinclusion_tbl.packageID')
              ->join('service_tbl','packageinclusion_tbl.serviceID','=','service_tbl.serviceID')
              ->where('packageinclusion_tbl.packageID', '=', $request->input('pg_id'))
              ->get();
      $equipid = DB::table('packageinclusion_tbl')
              ->join('package_tbl','package_tbl.packageID','=','packageinclusion_tbl.packageID')
              ->join('equipment_tbl','packageinclusion_tbl.equipmentID','=','equipment_tbl.equipmentID')
              ->where('packageinclusion_tbl.packageID', '=', $request->input('pg_id'))
              ->get();
      $empid = DB::table('packageinclusion_tbl')
              ->join('package_tbl','package_tbl.packageID','=','packageinclusion_tbl.packageID')
              ->join('employeetype_tbl','packageinclusion_tbl.employeeTypeID','=','employeetype_tbl.employeeTypeID')
              ->where('packageinclusion_tbl.packageID', '=', $request->input('pg_id'))
              ->get();

      return Response::json(['pckid'=>$pckid, 'pckgid'=>$pckgid, 'servid'=>$servid, 'equipid'=>$equipid, 'empid'=>$empid]);
    }

    public function getPay(Request $request){
      $paymentMode = DB::table('paymentmode_tbl') 
                    ->where('paymentmode_tbl.paymentModeID', '!=', $request->input('p_id'))
                    ->get();

      $paymentTerm = DB::table('paymentterm_tbl') 
                    ->where('paymentterm_tbl.paymentTermID', '!=', $request->input('p_id'))
                    ->get();

      return Response::json(['paymentMode'=>$paymentMode, 'paymentTerm'=>$paymentTerm]);
    }

    public function getPrice(Request $request){
      // foreach($request->input('d_id') as $d){
        $dish = DB::table('dish_tbl')
              ->where('dish_tbl.dishID', '=', $request->input('d_id'))
              ->get();
      // }

      return Response::json(['dish'=>$dish]);
    }

    public function getAdd(Request $request){
        $dish = DB::table('dish_tbl')
              ->where('dish_tbl.dishID', '=', $request->input('ad_id'))
              ->get();
      

      return Response::json(['dish'=>$dish]);
    }

    public function getServ(Request $request){
        $serv = DB::table('service_tbl')
              ->where('service_tbl.serviceID', '=', $request->input('as_id'))
              ->get();
      

      return Response::json(['serv'=>$serv]);
    }

    public function getEquip(Request $request){
        $equip = DB::table('equipment_tbl')
              ->where('equipment_tbl.equipmentID', '=', $request->input('ae_id'))
              ->get();
      

      return Response::json(['equip'=>$equip]);
    }

    public function getEmp(Request $request){
        $emp = DB::table('employeetype_tbl')
              ->where('employeetype_tbl.employeeTypeID', '=', $request->input('ae_id'))
              ->get();
      

      return Response::json(['emp'=>$emp]);
    }

     public function getCus(Request $request){
        $cus = DB::table('customer_tbl')
              ->where('customer_tbl.customerID', '=', $request->input('gc_id'))
              ->get();
      

      return Response::json(['cus'=>$cus]);
    }

    public function getReservation(Request $request){
        $rsvtn = DB::table('reservation_tbl')
              ->join('event_tbl','event_tbl.eventID','=','reservation_tbl.eventID')
              ->get();
      

      return Response::json(['rsvtn'=>$rsvtn]);
    }


    public function aboutPage(){
        $dishData = DB::table('dish_tbl')->join('dishtype_tbl','dishtype_tbl.dishTypeID','=','dish_tbl.dishTypeID')
        ->select('*')
        ->where('dish_tbl.dishAvailability', 1)->where('dish_tbl.dishStatus', 1)
        ->get();

        $addDishData = DB::table('dishtype_tbl')
        ->select('*')
        ->where('dishTypeStatus', 1)
        ->get();

        $dishDataID = DB::table('dish_tbl')->max('dishID');

        $dishNewID = $dishDataID + 1;
        return View::make('/UserAboutPage')->with('dishData', $dishData)->with('addDishData', $addDishData)->with('dishNewID', $dishNewID);
    }

    public function addReservation(Request $request){
    
     $pchecker = Input::get('pChecker');
     $pID = Input::get('pID');
     if($pchecker == 1){
       $event_tbl = new event_tbl;
     $event_tbl->eventID = Input::get('addEventID');
     $event_tbl->eventName = Input::get('eName');
     $event_tbl->eventDate = Input::get('eDate');
     $event_tbl->eventTime = Input::get('eTime');
     $event_tbl->endTime = Input::get('enTime');
     $event_tbl->eventLocation = Input::get('eLoc');
     $event_tbl->locationID = Input::get('eLoc2');
     $event_tbl->guestCount = Input::get('eNum');
     $event_tbl->eventStatus = 1;
     $event_tbl->eventTypeID = Input::get('eType');
      $customer_tbl = customer_tbl::find($pID);
      $customer_tbl->customerAvailability = 0;
      $customer_tbl->homeAddress = Input::get('homeAdd');
      $customer_tbl->emailAddress = Input::get('emailAdd');
      $customer_tbl->cellNum = Input::get('cellNum');
       $contact_tbl = new contact_tbl;
       $contact_tbl->contactID = Input::get('addContactID');
       $contact_tbl->contactName = Input::get('conPerson');
       $contact_tbl->contactNum = Input::get('conNum');
       $contact_tbl->customerID = Input::get('pID');
     $event_tbl->customerID = Input::get('pID');
    $reservation_tbl = new reservation_tbl;
    $reservation_tbl->reservationID = Input::get('addReservationID');
    $reservation_tbl->reservationStatus = 1;
    $reservation_tbl->eventID = Input::get('addEventID');
    $reservation_tbl->paymentModeID = Input::get('pmIDs');
    $reservation_tbl->paymentTermID = Input::get('ptIDs');
    $reservation_tbl->packageID = Input::get('addPackID');
    
      $customer_tbl->save();
      $contact_tbl->save();
      $event_tbl->save();
      $reservation_tbl->save();
     }
     if($pchecker == 0){
     $event_tbl = new event_tbl;
     $event_tbl->eventID = Input::get('addEventID');
     $event_tbl->eventName = Input::get('eName');
     $event_tbl->eventDate = Input::get('eDate');
     $event_tbl->eventTime = Input::get('eTime');
     $event_tbl->endTime = Input::get('enTime');
     $event_tbl->eventLocation = Input::get('eLoc');
     $event_tbl->locationID = Input::get('eLoc2');
     $event_tbl->guestCount = Input::get('eNum');
     $event_tbl->eventStatus = 1;
     $event_tbl->eventTypeID = Input::get('eType');
      $customer_tbl = new customer_tbl;
      $customer_tbl->customerID = Input::get('addCustomerID');
      $customer_tbl->fullName = Input::get('cusName');
      $customer_tbl->homeAddress = Input::get('homeAdd');
      $customer_tbl->billingAddress = Input::get('billAdd');
      $customer_tbl->emailAddress = Input::get('emailAdd');
      $customer_tbl->customerStatus = 1;
      $customer_tbl->customerAvailability = 1;
      $customer_tbl->cellNum = Input::get('cellNum');
      $customer_tbl->dateOfBirth = Input::get('dob');
       $contact_tbl = new contact_tbl;
       $contact_tbl->contactID = Input::get('addContactID');
       $contact_tbl->contactName = Input::get('conPerson');
       $contact_tbl->contactNum = Input::get('conNum');
       $contact_tbl->customerID = Input::get('addCustomerID');
     $event_tbl->customerID = Input::get('addCustomerID');
    $reservation_tbl = new reservation_tbl;
    $reservation_tbl->reservationID = Input::get('addReservationID');
    $reservation_tbl->reservationStatus = 1;
    $reservation_tbl->eventID = Input::get('addEventID');
    $reservation_tbl->paymentModeID = Input::get('pmIDs');
    $reservation_tbl->paymentTermID = Input::get('ptIDs');
    $reservation_tbl->packageID = Input::get('addPackID');

      $customer_tbl->save();
      $contact_tbl->save();
      $event_tbl->save();
      $reservation_tbl->save();
      }
      $dishID = Input::get('dishID');
      $servID = Input::get('servID');
      $equipID = Input::get('equipID');
      $empID = Input::get('empID');
      $addDishID = Input::get('addDishID');
      $addDishQty = Input::get('addDishQty');
      $addDishNotes = Input::get('addDishNotes');
      $addServID = Input::get('addServID');
      $addServQty = Input::get('addServQty');
      $addServNotes = Input::get('addServNotes');
      $addServDescs = Input::get('addServDescs');
      $addEquipID = Input::get('addEquipID');
      $addEquipQty = Input::get('addEquipQty');
      $addEquipNotes = Input::get('addEquipNotes');
      $addEquipDescs = Input::get('addEquipDescs');
      $addEmpID = Input::get('addEmpID');
      $addEmpQty = Input::get('addEmpQty');
      $addEmpNotes = Input::get('addEmpNotes');
    if(!empty($dishID[0][0])){
      for ($i = 0; $i < count($dishID); $i++){
        $maxDishAvailedID = DB::table('dishavailed_tbl')->max('dishAvailedID');
        $dishAvailedNewID = $maxDishAvailedID + 1;
        $da = dishavailed_tbl::create(array(
        'dishAvailedID' => $dishAvailedNewID,
        'dishID' =>$dishID[$i],
        'reservationID' =>Input::get('addReservationID')
        ));
        $da->save();
      }
    }
    if(!empty($servID[0][0])){
      for ($i = 0; $i < count($servID); $i++){
        $maxServAvailedID = DB::table('serviceavailed_tbl')->max('serviceAvailedID');
        $servAvailedNewID = $maxServAvailedID + 1;
        $sa = serviceavailed_tbl::create(array(
        'serviceAvailedID' => $servAvailedNewID,
        'serviceID' =>$servID[$i],
        'reservationID' =>Input::get('addReservationID')
        ));
        $sa->save();
      }
    }
    if(!empty($equipID[0][0])){
      for ($i = 0; $i < count($equipID); $i++){
        $maxEquipAvailedID = DB::table('equipmentavailed_tbl')->max('equipmentAvailedID');
        $equipAvailedNewID = $maxEquipAvailedID + 1;
        $ea = equipmentavailed_tbl::create(array(
        'equipmentAvailedID' => $equipAvailedNewID,
        'equipmentID' =>$equipID[$i],
        'reservationID' =>Input::get('addReservationID')
        ));
        $ea->save();
      }
    }
    if(!empty($empID[0][0])){
      for ($i = 0; $i < count($empID); $i++){
        $maxEmpEmployedID = DB::table('employeeemployed_tbl')->max('employeeEmployedID');
        $empEmployedID = $maxEmpEmployedID + 1;
        $ee = employeeemployed_tbl::create(array(
        'employeeEmployedID' => $empEmployedID,
        'employeeTypeID' =>$empID[$i],
        'reservationID' =>Input::get('addReservationID')
        ));
        $ee->save();
      }
    }
    if(!empty($addDishID[0][0])){
      for ($i = 0; $i < count($addDishID); $i++){
        $maxAddDishID = DB::table('dishadditional_tbl')->max('additionalID');
        $additionalDishID = $maxAddDishID + 1;
        $ad = dishadditional_tbl::create(array(
        'additionalID' => $additionalDishID,
        'additionalServing' => $addDishQty[$i],
        'additionalNotes' => $addDishNotes[$i],
        'dishID' =>$addDishID[$i],
        'reservationID' =>Input::get('addReservationID')
        ));
        $ad->save();
      }
    }
    if(!empty($addServID[0][0])){
      for ($i = 0; $i < count($addServID); $i++){
        $maxAddServID = DB::table('serviceadditional_tbl')->max('serviceAdditionalID');
        $additionalServID = $maxAddServID + 1;
        $as = serviceadditional_tbl::create(array(
        'serviceAdditionalID' => $additionalServID,
        'serviceAdditionalQty' => $addServQty[$i],
        'serviceAdditionalNotes' => $addServNotes[$i],
        'serviceAdditionalDesc' => $addServDescs[$i],
        'serviceID' =>$addServID[$i],
        'reservationID' =>Input::get('addReservationID')
        ));
        $as->save();
      }
    }
    if(!empty($addEquipID[0][0])){
      for ($i = 0; $i < count($addEquipID); $i++){
        $maxAddEquipID = DB::table('equipmentadditional_tbl')->max('equipmentAdditionalID');
        $additionalEquipID = $maxAddEquipID + 1;
        $ae = equipmentadditional_tbl::create(array(
        'equipmentAdditionalID' => $additionalEquipID,
        'equipmentAdditionalQty' => $addEquipQty[$i],
        'equipmentAdditionalNotes' => $addEquipNotes[$i],
        'equipmentAdditionalDesc' => $addEquipDescs[$i],
        'equipmentID' =>$addEquipID[$i],
        'reservationID' =>Input::get('addReservationID')
        ));
        $ae->save();
      }
    }
    if(!empty($addEmpID[0][0])){
      for ($i = 0; $i < count($addEmpID); $i++){
        $maxAddEmpID = DB::table('employeeadditional_tbl')->max('employeeAdditionalID');
        $additionalEmpID = $maxAddEmpID + 1;
        $aem = employeeadditional_tbl::create(array(
        'employeeAdditionalID' => $additionalEmpID,
        'employeeAdditionalQty' => $addEmpQty[$i],
        'employeeAdditionalNotes' => $addEmpNotes[$i],
        'employeeTypeID' =>$addEmpID[$i],
        'reservationID' =>Input::get('addReservationID')
        ));
        $aem->save();
      }
    }
  }
}
