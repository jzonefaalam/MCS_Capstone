<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
	public function send(){
		Mail::send(	['text'=>'mail'],['name','MCS'],function ($message){
			$message->to('jsooooon017@gmail.com', 'To Jayson')
					->subject('Test Email');
			$message->from('jsooooon017@gmail.com', 'From Jayson');
		});
	}
}
