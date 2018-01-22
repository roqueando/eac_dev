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

    public function newpost() {
    	$data = [
    		'user' => Auth::user()
    	];

    	return view('adm.newpost', $data);
    }

    public function insertpost(Request $request) {
    	$data = [
    		'result' => 'rst'
    	];
    	return response()->json(['Success'=>'YeS'], 200);
    }
}
