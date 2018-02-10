<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class eac_races extends Model {
    protected $fillable = [
        'race_name',
        
    ];

    public $timestamps = false;

    public static function retrieve() {

    	$result = DB::table('eac_races')
    			->select("*")
    			->join('eac_races_options', 'eac_races.id', '=', 'eac_races_options.race_id')
    			->get();

    	return $result;
    }
}
