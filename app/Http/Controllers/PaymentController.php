<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Payment;
//use Faker\Provider\ar_SA\Payment;　これをいれるとエラー

class PaymentController extends Controller
{
    public function add()
    {
        return view('payment');
    }
    public function payment(Request $request)
    {
        $this -> validate($request,Payment::$rules);
        $payment = new Payment;
        $form=$request->all();
        $payment->name="入金";
        $payment ->fill($form)->save();
        
        $check=Payment::latest()->first();

        return view('check',['check'=>$check]);
    }
}
