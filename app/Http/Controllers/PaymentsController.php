<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Customer;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $user_id = auth()->user()->id;
        $payments = Payment::select('payments.id','payments.date','payments.amount','payments.status','payments.notes','customers.name','customers.id AS customer_id')
                    ->leftjoin('customers','payments.customer_id','=','customers.id')
                    ->where('payments.user_id',$user_id)->get();

        $customers = Customer::where('user_id',$user_id)->get();
    
        return view('payments.index',compact('payments','customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valores = $request->valores;
        $date = date('Y-m-d',strtotime($valores['date']));


        $payment = new Payment;
        $payment->date = $date;
        $payment->amount = $valores['amount'];
        $payment->status = 'en-tiempo';
        $payment->notes = $valores['notes'];
        $payment->customer_id = $valores['customer_id'];
        $payment->user_id = auth()->user()->id;
        $payment->save();
        if($payment->save()){
            return 'success';
        }else{
            return 'error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $valores = $request->valores;
        $date = date('Y-m-d',strtotime($valores['date']));
        
        $payment->date = $date;
        $payment->amount = $valores['amount'];
        $payment->status = 'en-tiempo';
        $payment->notes  = $valores['notes'];
        $payment->customer_id = $valores['customer_id'];
        $payment->user_id = auth()->user()->id;
        $payment->update();
        if($payment->update()){
            return 'success';
        }else{
            return 'error';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        if($payment->delete()){
            return 'success';
        }else{
            return 'error';
        }
    }
}
