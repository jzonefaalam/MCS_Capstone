<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class login extends Controller
{
    //
    public function doLogin(Request $req){
    	$user = $req->input('user');
        $pass = $req->input('password');

        if(Auth::attempt(['username'=> $user,'password'=> $pass])){
            // return redirect('Admin/Dashboard'); 
            return redirect('/RegisterAccount');
        }
        else{
            // return redirect('/Admin')->with('message',['text'=>'Wrong Username and/or Password.']);
            return redirect('/Login');
        }
    }
}
