<?php

namespace App;

use App\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'date', 'amount','status','notes'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
