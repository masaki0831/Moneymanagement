<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdrawal;

class WithdrawalController extends Controller
{
    public function add()
    {
        return view('withdrawal');
    }
    public function withdrawal(Request $request)
    {
        $this -> validate($request,Withdrawal::$rules);
        $withdrawal = new Withdrawal;
        $form=$request->all();
        $withdrawal->name="出金";
        $withdrawal ->fill($form)->save();

        $check=Withdrawal::latest()->first();

        return view('check',['check'=>$check]);
        
    }
}
