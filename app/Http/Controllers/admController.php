<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\eac_posts;
use App\eac_albums;
use App\eac_images;
use App\eac_races;
use App\eac_races_options;
use App\eac_subscribes;

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

    public function deletepost() {
        $data = [
            'user' => Auth::user(),
            'posts' => eac_posts::all(),
        ];

        return view('adm.deletepost', $data);
    }

    public function newrace() {
    	$data = [
    		'user' => Auth::user()
    	];

    	return view('adm.newrace', $data);
    }

    public function deleterace() {
        $data = [
            'user' => Auth::user(),
            'races' => eac_races::all(),
        ];

        return view('adm.deleterace', $data);
    }

    public function newalbum() {
        $data = [
            'user' => Auth::user(),
            'albums' => eac_albums::all()
        ];

        return view('adm.newalbum', $data);
    }


    public function deletealbum() {
        $data = [
            'user' => Auth::user(),
            'galeries' => eac_albums::all()
        ];

        return view('adm.deletealbum', $data);
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

    public function getraces_fromid(Request $req) {

        $data = [
            'race' => eac_races::retrieveFromId($req->id)
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

        $races = new eac_races();
        $opt = new eac_races_options();

        $races->race_name = $request->race_name;
        $races->race_type = $request->choose;
        $races->race_value = $request->race_value;
        $races->save();

        $coded = json_encode($request->trajects);
        $opt->race_id = $races->id;
        $opt->trajectOpt = $coded;
        $opt->localization = $request->race_local;
        $opt->date_marked = $request->race_date;
        $opt->hour_marked = $request->race_hour;
        $opt->description = $request->race_description;
        $opt->atlet_kit = $request->race_date_kit;
        $opt->save();

        return response()->json(['Success'=>'Has finish'], 200);
        

       
    }

    public function post_delete(Request $req) {

        $id = $req->id;

        eac_posts::select('*')
                ->where('id', $id)
                ->delete();

        return response()->json(['Success'=>"Deletado com sucesso"], 200);
    }
    public function race_delete(Request $req) {

        $id = $req->id;

        eac_races::select('*')
                ->where('id', $id)
                ->delete();

        eac_races_options::select('*')
                ->where('race_id', $id)
                ->delete();

        eac_subscribes::select('*')
                ->where('race_id', $id)
                ->delete();

        return response()->json(['Success'=>"Deletado com sucesso"], 200);
    }

    public function gallery_delete(Request $req) {

        $id = $req->id;

        eac_albums::select('*')
                ->where('id', $id)
                ->delete();

        return response()->json(['Success'=>"Deletado com sucesso"], 200);
    }

}
