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
    			->select("eac_races.race_name", "eac_races.id", 'eac_races_options.trajectOpt','eac_races.race_value' , 'eac_races_options.localization', 'eac_races_options.date_marked', 'eac_races_options.hour_marked', 'eac_races_options.description')
    			->join('eac_races_options', 'eac_races.id', '=', 'eac_races_options.race_id')
    			->get();

    	return $result;
    }

    public static function retrieveFromId($id) {

        $result = DB::table('eac_races')
                ->select("eac_races.race_name", "eac_races.id", 'eac_races_options.trajectOpt','eac_races.race_value' , 'eac_races_options.localization', 'eac_races_options.date_marked', 'eac_races_options.hour_marked', 'eac_races_options.description')
                ->join('eac_races_options', 'eac_races.id', '=', 'eac_races_options.race_id')
                ->where('eac_races.id', $id)
                ->get();

        return $result;
    }

    public static function retrieveMyRaces($id) {

        $result = DB::table('eac_subscribes')
                ->select("eac_races.race_name", "eac_subscribes.race_id", "eac_races.id", "eac_subscribes.race_value", "eac_subscribes.blouse_height", "eac_subscribes.status", "eac_subscribes.id AS subId")
                ->join('eac_races', 'eac_subscribes.race_id', '=', 'eac_races.id')
                ->where('eac_subscribes.user_id', $id)
                ->get();

        return $result;
    }
}
