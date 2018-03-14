<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
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

    public static function retrieve_userById($id) {
        $result = DB::table('eac_users')
                ->select('eac_users.name', 'eac_users.cpf')
                ->where('eac_users.id', $id)
                ->get();
        return $result;
    }

    protected $hidden = ['password'];
    
}
