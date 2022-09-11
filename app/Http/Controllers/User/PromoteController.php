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

        if ($result->success) {
            $start = date('Y-m-d H:i:s');
            $stop = $data['duration'];
            $time = date('Y-m-d H:i:s', strtotime("+{$stop} hours"));
            $house_id = $data['house_id'];
            $promote_id = $data['promote_id'];
            $promote->houses()->attach($house_id, ['promote_id' => $promote_id, 'expire_date' => $time, 'created_at' => $start]);
        } else {

            return redirect()->back()->with('status', "Al momento la transazione non è disponibile");
        }
        return redirect()->route('user.houses.show', $house_id)->with('status', "La tua struttura verrà sponsorizzata per $stop ore");
    }

}   
