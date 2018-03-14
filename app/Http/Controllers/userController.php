<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eac_users;
use App\eac_races;
use App\eac_subscribes;
use Auth;
// use PagarMe;
use  \PagarMe\Sdk\PagarMe;
class userController extends Controller {
    
    public function pay(Request $req) {
    	$api_key = "ak_test_qfLQjleBjjHCErH5yUmovoe7O6LiFb";
    	$pagarme = new \PagarMe\Sdk\PagarMe($api_key);
    	$amount = 3500;
        $postbackUrl = 'http://requestb.in/pkt7pgpk';
        $metadata = ['idProduto' => 13933139];
        $customer = new \PagarMe\Sdk\Customer\Customer([
            'name' => 'John Dove',
            'document_number' => '09130141095'
        ]);

    	$transaction = $pagarme->transaction()->boletoTransaction(
            $amount,
            $customer,
            $postbackUrl,
            $metadata
        );
    	return response()->json(['message'=> $transaction], 200);

    }

    public function subscribe(Request $req) {

        $s = new eac_subscribes();
        $s->user_id = $req->user_id;
        $s->race_id = $req->race_id;
        $s->race_value = $req->race_value;
        $s->blouse_height = $req->blouse;
        $s->incident = $req->incident;
        $s->status = $req->status;
        $s->save();

        return response()->json(['Inscrito'=>"Sucesso!"], 200);
        
    }

    public function cancel(Request $req) {

        eac_subscribes::deleteFromId($req->id);
        return response()->json(['success'=> 'deleted!'], 200);

    }

    public function retrievedata(Request $req) {
        $data = [
            'user'=>eac_users::retrieve_userById($req->id),
        ];

        return response()->json($data, 200);
    }

    public function myraces() {
        $data = [
            'user' => Auth::user(),
            'myraces' => eac_races::retrieveMyRaces(Auth::id())
        ];

        return view('myraces', $data);
    }
}
