<?php

namespace App;

use App\User;
use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'amount', 'interest_percentage', 'date','scheme','notes','type_of_loan','status'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
