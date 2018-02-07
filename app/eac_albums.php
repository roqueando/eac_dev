<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eac_albums extends Model {
    protected $fillable = [
        'album_name',
        
    ];

    public $timestamps = false;
}
