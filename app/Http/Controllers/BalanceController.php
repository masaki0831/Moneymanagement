<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Withdrawal;
use Faker\Provider\ar_SA\Payment as Ar_SAPayment;

class BalanceController extends Controller
{
    public function index(Request $request)
    {
        $payments=Payment::select(DB::raw('sum(money) as total_money'))->get();
        $withdrawals=Withdrawal::select(DB::raw('sum(money) as total_money'))->get();

        $query_1 = Payment::where('id','>=',0);
        $query_2 = Withdrawal::where('id','>=',0);
        $histories = $query_2->union($query_1)->orderBy('date','desc')->take(5)->get();
        return view('balance',['withdrawals'=>$withdrawals,'payments'=>$payments,'histories'=> $histories]);
    }

    public function edit(Request $request)
    {
        
        if($request->name=="入金"){
            $payment = Payment::find($request->id);
            return view('edit',['edit_form'=>$payment]);
        }else{
            $withdrawal = Withdrawal::find($request->id);
            return view('edit',['edit_form'=>$withdrawal]);
        }
        
    }

    public function update(Request $request)
    {
        if($request->name=="入金"){
        $this->validate($request,Payment::$rules);

        $payment = Payment::find($request->id);
        $payment_form = $request->all();
        unset($payment_form['name']);
        $payment->fill($payment_form)->save();

        return redirect('/');
        }else{
        $this->validate($request,Withdrawal::$rules);
        $withdrawal = Withdrawal::find($request->id);
        $withdrawal_form = $request->all();
        unset($withdrawal_form['name']);
        $withdrawal->fill($withdrawal_form)->save();

        return redirect('/');
        }
        
    }
    
    public function search(Request $request)
    {
        $query='';
        if($request->name=="入金"){
            
            $search=$request->input('date');
            
            if(!empty($search)){
                $query=Payment::where('date',$search)->get();
            }
            return view('search',['queries'=>$query]);
        }else{
            
            $search=$request->input('date');
            
            if(!empty($search)){
                $query=Withdrawal::where('date',$search)->get();
            }
            return view('search',['queries'=>$query]);
        }
            
    }

    public function delete(Request $request)
    {
        if($request->name=="入金"){
        $payment =Payment::find($request->id);
        $payment->delete();
        return redirect('/');
        }else{
        $withdrawal =Withdrawal::find($request->id);
        $withdrawal->delete();
        return redirect('/');
        }
        
    }
    
    
}
