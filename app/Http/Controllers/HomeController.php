<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Income;
use App\Wallet;
use App\Expense;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user_id = auth()->user()->id;
        $user = auth()->user();
        $wallets = Wallet::where('user_id',$user_id)->get();

       $loans = Loan::where('user_id',$user_id)->sum('amount');

       $payments = Customer::select(DB::raw('SUM(payments.amount) as total'))
                            ->join('payments','customers.id','=','payments.id')
                            ->where('user_id',$user_id)
                            ->get();

        $totalPayments = $payments->pluck('total');

        $totalCustomers = Customer::where('user_id',$user_id)->count();

        $expenses = Expense::where('user_id',$user_id)->sum('amount');

        $incomes = Income::where('user_id',$user_id)->sum('amount');
        
        return view('home',compact('wallets','loans','totalPayments','totalCustomers','expenses','incomes'));
    }
}
