<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoreController extends Controller
{
    
	public function showHome(){

		return view('home');
		
	}

}
