<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class eac_users extends Authenticatable {
    use Notifiable;

    public $timestamps = false;
    protected $fillable = [
        'cpf',
        'password',
        'name',
        'age',
        'rg',
        'address',
        'cep',
        'telephone',
        'facebook',
        'racing_groups',
        'group_fb_page',
        'civil_state',
        'term'
        
    ];

    protected $hidden = ['password'];
    
}
