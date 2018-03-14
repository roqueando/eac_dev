<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\eac_albums;
use App\eac_images;
use App\eac_races;
use App\eac_posts;

class homeController extends Controller {

    public function index() {
    	$data = [
    		'user' => Auth::user(),
    	];

    	return view('home', $data);
    }

    public function logout() {
        Auth::logout();

        return response()->json(['success'=>'Success'],200);
        return redirect('/');
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

    public function races() {
        $data = [
            'user' => Auth::user(),
            'races' => eac_races::retrieve()
        ];

        return view('races', $data);
    }

    public function services() {
        $data = [
            'user' => Auth::user()
        ];

        return view('services', $data);
    }

    public function loadphotos(Request $request) {

    	$data = [
    		'photos' => eac_images::where('album_id', '=', $request->id)->get(),

    	];

    	return response()->json($data, 200);
    }
}
