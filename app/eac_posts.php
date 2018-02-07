<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eac_posts extends Model {
    protected $fillable = [
        'title',
        'author',
        'post_message',
        'image',
        'video'
    ];

    public $timestamps = false;
}
