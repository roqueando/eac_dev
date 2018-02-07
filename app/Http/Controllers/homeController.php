<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\eac_albums;
use App\eac_images;
class homeController extends Controller {

    public function index() {
    	$data = [
    		'user' => Auth::user()
    	];

    	return view('home', $data);
    }

    public function logout() {
        Auth::logout();

        return response()->json(['success'=>'Success'],200);
    }

    public function about() {
        $data = [
            'user' => Auth::user()
        ];
    	return view('about', $data);
    }

    public function photos() {
    	$data = [
    		'albums' => eac_albums::all(),
    		'user' => Auth::user()
    	];

    	return view('photos', $data);
    }

    public function loadphotos(Request $request) {

    	$data = [
    		'photos' => eac_images::where('album_id', '=', $request->id)->get(),

    	];

    	return response()->json($data, 200);
    }
}
