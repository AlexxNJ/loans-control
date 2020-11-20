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

        //Billetera del usuario logeado
        $wallets = Wallet::where('user_id',$user_id)->get();

        //Presamos del usuario logeado
        $loans = Loan::where('user_id',$user_id)
                    ->where('status','activo')
                    ->sum('amount');

        //Prestamos de tipo billetera
        $loans_of_wallets = Loan::where('user_id',$user_id)
        ->where('status','activo')
        ->where('type_of_loan','billetera')
        ->sum('amount');

        //Prestamos de tipo interes
        $loans_of_interests = Loan::where('user_id',$user_id)
        ->where('status','activo')
        ->where('type_of_loan','intereses')
        ->sum('amount');

        //Pagos de los clientes del usuario logeado
        $payments = Payment::where('user_id',$user_id)->sum('amount');

        $totalCustomers = Customer::where('user_id',$user_id)->count();

        $expenses = Expense::where('user_id',$user_id)->sum('amount');

        $incomes = Income::where('user_id',$user_id)->sum('amount');

        //Proceso para obtener los intereses disponibles (dinero en mano)
        $sum_loans_interests = Loan::where('user_id',$user_id)
                        ->where('type_of_loan','intereses')
                        ->where('status','activo')
                        ->sum('amount');
                        
        $interests = Payment::where('user_id',$user_id)->sum('amount');

        $sum_incomes = Income::where('user_id',$user_id)->sum('amount');

        $sum_expenses = Expense::where('user_id',$user_id)->sum('amount');

        $in_vs_ex =  $sum_expenses - $sum_incomes;

        $sub_interests = $interests - $sum_loans_interests;

        $available_interests = $sub_interests - $in_vs_ex;
        
        return view('home',compact('wallets','loans','payments','totalCustomers','expenses','incomes','loans_of_wallets','loans_of_interests','available_interests'));
    }
}
