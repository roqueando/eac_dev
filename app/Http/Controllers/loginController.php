<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eac_users;
use Auth;
use Validator;

class loginController extends Controller {
    
    public function index() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function save(Request $request) {
      
        $messages = [
           'name.required' => 'O campo NOME é requerido',
            'cpf.required' => 'O campo CPF é requerido',
            'age.required' => 'O campo IDADE é requerido',
            'rg.required' => 'O campo RG é requerido',
            'address.required' => 'O campo ENDEREÇO é requerido',
            'cep.required' => 'O campo CEP é requerido',
            'phone.required' => 'O campo TELEFONE é requerido',
            'password.required' => 'O campo SENHA é requerido',
            'civil_state.required' => 'O campo ESTADO CIVIL é requerido',
            'term.required' => 'O campo TERMO é requerido',

        ];

        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'cpf' => 'required',
            'age' => 'required',
            'rg' => 'required',
            'address' => 'required',
            'cep' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'civil_state' => 'required',
            'term' => 'required',

        ], $messages);


        if($validator->passes()) {
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

        } elseif($validator->fails()) {

            return response()->json(['Error'=> $validator->errors()->all()], 400);
        }


    }

    public function enter(Request $request) {
        $messages = [
            'cpf.required' => 'O campo CPF é requerido',
            'password.required' => "O campo SENHA é requerido!"
        ];

        $validator = Validator::make($request->all(),[
            'cpf' => 'required',
            'password' => 'required',
        ], $messages);

        

        $creds  = [
            'cpf' => $request->cpf,
            'password' => $request->password
        ];

         $admCreds  = [
            'cpf' => $request->cpf,
            'password' => $request->password
        ];

        $errors_msg = [
            'user' => "Usuário não encontrado",
        ];

        if($validator->passes()) {

            if(Auth::attempt($creds)) {
                return response()->json(['user'=>Auth::user()],200);

            } elseif (Auth::attempt($admCreds)) {

                 return response()->json(['success'=>'Logado com Sucesso! '],['ADM'=> 'B3M V1ND0 4DM1N15TR4D0R'],200);
            }  else {
                return response()->json(['Error'=>$errors_msg],401);
            }   

        }else {
            if($validator->fails()) {
                return response()->json(['Error'=> $validator->errors()->all()],401);
            }
        }
        
    }
}
