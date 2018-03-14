<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class eac_subscribes extends Model {
     protected $fillable = [
        'user_id',
        'race_id',
        'race_value',
        'blouse_height',
        'terms',
        'traject',
        'incident'
        
    ];

    public static function deleteFromId($id) {

        $result = DB::table('eac_subscribes')
                ->where('id', $id)
                ->delete();

        return $result;

    }

    public $timestamps = false;
}
