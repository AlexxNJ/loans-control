<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Income;
use App\Wallet;
use App\Expense;
use App\Payment;
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

       $loans = Loan::where('user_id',$user_id)
                    ->where('status','activo')
                    ->sum('amount');

       $payments = Payment::where('user_id',$user_id)->sum('amount');

        $totalCustomers = Customer::where('user_id',$user_id)->count();

        $expenses = Expense::where('user_id',$user_id)->sum('amount');

        $incomes = Income::where('user_id',$user_id)->sum('amount');
        
        return view('home',compact('wallets','loans','payments','totalCustomers','expenses','incomes'));
    }
}
