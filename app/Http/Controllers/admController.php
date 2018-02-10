<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\eac_posts;
use App\eac_albums;
use App\eac_images;
use App\eac_races;
use App\eac_races_options;

class admController extends Controller {

    /*
        @function dashboard()
                @description
                Return the view of Main DashBoard.
    */
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

    public function newrace() {
    	$data = [
    		'user' => Auth::user()
    	];

    	return view('adm.newrace', $data);
    }

    public function newalbum() {
        $data = [
            'user' => Auth::user(),
            'albums' => eac_albums::all()
        ];

        return view('adm.newalbum', $data);
    }

    public function getraces() {
        
        $data = [
            'races' => eac_races::retrieve(),
        ];

        return response()
                ->json($data, 200);
    }


    public function insertpost(Request $request) {
    	$p = new eac_posts();

    	if($request->hasFile('video')){

				$videoName = time().md5(rand(0,999)).'.'.$request->video->getClientOriginalExtension();
				$request->video->move(public_path('images/videos'), $videoName);
				
				$p->title = $request->title;
				$p->author = $request->author;
				$p->post_message = $request->text;
				$p->video = $videoName;
				
				$p->save();

				return response()->json(['Success'=> 'Post Created with an Video!!']);

		} else if($request->hasFile('img')) {

				$imgName = time().md5(rand(0,999)).'.'.$request->img->getClientOriginalExtension();
				$request->img->move(public_path('images/post_imgs'), $imgName);
				
				$p->title = $request->title;
				$p->author = $request->author;
				$p->post_message = $request->text;
				$p->image = $imgName;
				
				$p->save();

				return response()->json(['Success'=> 'Post Created with an Image!!']);
		}

    	$p->title = $request->title;
		$p->author = $request->author;
		$p->post_message = $request->text;
		$p->save();
			return response()->json(['Success'=>'POST_CREATED'], 200);
    }

    public function getposts() {
    	$data = [
    		'posts' => eac_posts::all()
    	];

    	return response()->json($data, 200);
    }

    public function createalbum(Request $request) {

        $a = new eac_albums();

        $a->album_name = $request->name;
        $a->save();

        return response()->json(['created'=>true],200);

    }

    public function insertphoto(Request $request) {

        $i = new eac_images();

        if($request->hasFile('album_image')) {

                $imgName = time().md5(rand(0,999)).'.'.$request->album_image->getClientOriginalExtension();
                $request->album_image->move(public_path('images/image_gallery'), $imgName);
                
                $i->album_id = $request->album_id;
                $i->image = $imgName;
               
                
                $i->save();

                return response()->json(['Success'=> 'created an image gallery'], 200);
        }
    }

    public function insert_race(Request $request) {

        if($request->choose == '0') {
            $races = new eac_races();
            $opt = new eac_races_options();

            $races->race_name = $request->race_name;
            $races->save();

            $opt->race_id = $races->id;
            $opt->trj1 = $request->trj1;
            $opt->trj2 = $request->trj2;
            $opt->save();
            return response()->json(['Success'=>'Has finish'], 200);
        }
        

       
    }



}
