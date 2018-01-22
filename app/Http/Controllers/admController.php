<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class admController extends Controller {
    public function dashboard() {
    	$data = [
    		'user' => Auth::user()
    	];

    	return view('adm.index', $data);
    }
}
