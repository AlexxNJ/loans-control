<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $expenses = Expense::where('user_id',$user_id)->get();

        return view('expenses.index',compact('expenses'));
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
        $user_id = auth()->user()->id;
        
        $income = new Expense;
        $income->date = $date;
        $income->amount = $valores['amount'];
    
        if($valores['description'] != null){
            $income->description = $valores['description'];
        }
        $income->user_id = $user_id;
        $income->save();
        if($income->save()){
            return 'success';
        }else{
            return 'error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $valores = $request->valores;
        $date = date('Y-m-d',strtotime($valores['date']));

        $expense->date = $date;
        $expense->amount = $valores['amount'];
        if($valores['description'] != null){
            $expense->description = $valores['description'];
        }
        $expense->save();

        if($expense->save()){
            return 'success';
        }else{
            return 'error';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        if($expense->delete()){
            return 'success';
        }else{
            return 'error';
        }
    }
}
