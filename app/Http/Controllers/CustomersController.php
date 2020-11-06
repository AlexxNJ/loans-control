<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $customers = Customer::where('user_id',$user_id)->get();

        return view('customers.index',compact('customers'));
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
        
        $customer = new Customer;
        $customer->name = $valores['name'];
        if($valores['phone_number'] != null){
            $customer->phone_number = $valores['phone_number'];
        }
        if($valores['email'] != null){
            $customer->email = $valores['email'];
        }
        $customer->user_id = auth()->user()->id;
        $customer->save();
        if($customer->save()){
            return 'success';
        }else{
            return 'error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $array = $request->valores;
        $array = json_decode($array);
        
        $customer->name = $array[0]->name;
        $customer->phone_number = $array[0]->phone_number;
        $customer->email = $array[0]->email;
        $customer->status = $array[0]->isActive;
        $customer->save();

        if($customer->save()){
            return 'success';
        }else{
            return 'error';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        if($customer->delete()){
            return 'success';
        }else{
            return 'error';
        }
    }
}
