<?php

namespace App\Http\Controllers;

use App\Income;
use Illuminate\Http\Request;

class IncomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $incomes = Income::where('user_id',$user_id)->get();

        return view('incomes.index',compact('incomes'));
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
        
        $income = new Income;
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
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $valores = $request->valores;
        $date = date('Y-m-d',strtotime($valores['date']));

        $income->date = $date;
        $income->amount = $valores['amount'];
        if($valores['description'] != null){
            $income->description = $valores['description'];
        }
        $income->save();

        if($income->save()){
            return 'success';
        }else{
            return 'error';
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        $income->delete();
        if($income->delete()){
            return 'success';
        }else{
            return 'error';
        }
    }
}
