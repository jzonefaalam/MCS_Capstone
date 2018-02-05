<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\coursetbl;
class addDishController extends Controller
{
    public function addDishes() 
    {
        $dishID = Input::get('addDishID');
        $dishName = Input::get('addDishName');
        $dishDesc = Input::get('addDishDesc');
        $dishCosts = Input::get('addDishCost')
        $dishTypeIDs = Input::get('addDishType');
        $dishImage = "No Image.jpg";

        $saveData = coursetbl::create(array(
        'dishID' => "4",
        'dishName'=> "dishName",
        'dishDescription' =>"dishDesc",
        'dishCost' =>"12",
        'dishTypeID' =>"dishTypeIDs",
        'imageName' =>"dishImage",
        'dishAvailability' => '1',
        'dishStatus' => '1'
        ));
        $saveData->save();


    }
}
