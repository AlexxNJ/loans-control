<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Income;
use App\Wallet;
use App\Expense;
use App\Payment;
use App\Customer;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $loans = Loan::join('customers','loans.customer_id','=','customers.id')
                        ->where('loans.user_id',$user_id)->get();      

        $sum_loans_wallets = Loan::where('user_id',$user_id)
                        ->where('type_of_loan','billetera')
                        ->sum('amount');
        
        $sum_loans_interests = Loan::where('user_id',$user_id)
                        ->where('type_of_loan','intereses')
                        ->where('status','activo')
                        ->sum('amount');

        $wallets = Wallet::where('user_id',$user_id)->get();
        
        $customers = Customer::where('user_id',$user_id)->where('status','activo')->get();

        $interests = Payment::where('user_id',$user_id)->sum('amount');

        $sum_incomes = Income::where('user_id',$user_id)->sum('amount');

        $sum_expenses = Expense::where('user_id',$user_id)->sum('amount');

        $in_vs_ex =  $sum_expenses - $sum_incomes;

        $sub_interests = $interests - $sum_loans_interests;

        $available_interests = $sub_interests - $in_vs_ex;
        
        return view('loans.index',compact('loans','sum_loans_wallets','wallets','customers','available_interests'));
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
        $user_id = auth()->user()->id;
        $valores = $request->valores;
        $array_loans = $valores['array_loans'];
        $date = date('Y-m-d',strtotime($valores['date']));
        $tipo_prestamo = $request->tipo_prestamo;
        
        for($i = 0; $i<sizeof($array_loans);$i++){
            $loans = new Loan;
            $loans->amount = $array_loans[$i];
            $loans->interest_percentage = $valores['interest_percentage'];
            $loans->date = $date;
            $loans->scheme = $valores['scheme'];
            $loans->notes = $valores['notes'];
            $loans->type_of_loan = $tipo_prestamo[$i];
            $loans->status = 'activo';
            $loans->customer_id = $valores['customer_id'];
            $loans->user_id = $user_id;
            $loans->save();
        }

        if($loans->save()){
            return 'success';
        }else{
            return 'error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer_id)
    {
        $valores = $request->valores;
        $date = date('Y-m-d',strtotime($valores['date']));
        $old_date = date('Y-m-d',strtotime($valores['old_date']));
        
        $loans = Loan::where('customer_id',$customer_id)
                    ->where('date',$old_date)
                    ->get();
        //return $loans;
        foreach ($loans as $loan) {
            $loan->customer_id = $valores['customer_id'];
            $loan->interest_percentage = $valores['interest'];
            $loan->date = $date;
            $loan->scheme = $valores['scheme'];
            $loan->notes = $valores['notes'];
            $loan->update();
        }
        if($loan->update()){
            return 'success';
        }else{
            return 'error';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$customer_id)
    {
        $date = date('Y-m-d',strtotime($request->date));

        $loans = Loan::where('customer_id',$customer_id)
                    ->where('date',$date)
                    ->get();

        foreach ($loans as $loan) {
            $loan->delete();
        }
        if($loan->delete()){
            return 'success';
        }else{
            return 'error';
        }
    }
}
