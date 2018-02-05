<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class registerAccount extends Controller
{
    //
    public function doRegisterAccount(Request $req){
    	
        DB::table('users')->insert(
        		[
        		'username' => $_POST['user'], 
        		'password' => bcrypt($_POST['password']), 
        		'created_at' => date_create('now'), 
        		'updated_at' => date_create('now')
        		]
        	);
        return redirect('/Login');
    }
}
