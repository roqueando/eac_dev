<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eac_races extends Model {
    protected $fillable = [
        'race_name',
        'race_localization',
        
    ];

    public $timestamps = false;
}
