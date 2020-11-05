<?php

namespace App;

use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'date', 'amount','status','notes'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
