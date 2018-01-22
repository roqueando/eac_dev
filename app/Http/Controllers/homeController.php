<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class homeController extends Controller {

    public function index() {
    	$data = [
    		'user' => Auth::user()
    	];

    	return view('home', $data);
    }

    public function about() {
    	return view('about');
    }
}
