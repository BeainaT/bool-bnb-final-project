<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promote;
use App\House;
use Braintree;
use Illuminate\Support\Facades\Auth;

class PromoteController extends Controller
{
    public function index(House $house) {
        $promotes = Promote::all();

        return view('user.promotes.index', compact('promotes', 'house'));
    }
    
    public function show(House $house, Promote $promote) {
        
        //fill pivot promote_house
        $promote->houses()->attach($house->id);

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $token = $gateway->clientToken()->generate();

        return view('user.promotes.show', compact('house', 'promote', 'token'));
    }

    public function payment(Request $request, House $house, Promote $promote) {
        $data = $request->all();
        $user = Auth::user();

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->payment_method_nonce,
            'customer' => [
                'firstName' => $user->name,
                'lastName' => $user->surname,
                'email' => $user->email,
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        // if($result->success) {
        //     $promote->houses()->attach($data['house_id']);            
        // }
    }

}   
