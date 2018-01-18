<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eac_users;
use Auth;

class loginController extends Controller {
    
    public function index() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function save(Request $request) {
      
        $u = new eac_users();
        $u->name = $request->name;
        $u->cpf = $request->cpf;
        $u->age = $request->age;
        $u->rg = $request->rg;
        $u->address = $request->address;
        $u->cep = $request->cep;
        $u->telephone = $request->phone;
        $u->facebook = $request->fb;
        $u->racing_groups = $request->group_name;
        $u->group_fb_page = $request->group_fb;
        $u->password = bcrypt($request->password);
        $u->civil_state = $request->civil_state;
        $u->term = $request->term;
       
        $u->save();

        return response()->json(['success'=>'Registered!'], 200);


    }

    public function enter(Request $request) {
        $creds  = [
            'cpf' => $request->cpf,
            'password' => $request->password
        ];
        if(Auth::attempt($creds)) {
            return response()->json(['success'=>'Logado com Sucesso!'],200);
        } else {
            return response()->json(['Error'=>"Error - Isn't Logged"],401);
        }
    }
}
