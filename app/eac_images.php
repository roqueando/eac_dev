<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class eac_images extends Model {
    protected $fillable = [
        'album_id',
        'image'
        
    ];

    public $timestamps = false;

    public static function retrieveFromId($id) {
    	$result = DB::table('eac_images')
    				->select('image', 'album_id')
    				->join('eac_albums', 'eac_albums.id', '=', 'eac_images.album_id')
    				->get();
    	return $result;
    }
}
