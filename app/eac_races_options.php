<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eac_races_options extends Model {
    
    protected $fillable = [
        'race_id',
        'trj1',
        'trj2',
        'trj3',
        'trj4',
        'trj5',
        'trj6',
        
    ];

    public $timestamps = false;
}
