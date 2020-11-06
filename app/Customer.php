<?php

namespace App;

use App\Loan;
use App\User;
use App\Group;
use App\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'phone_number', 'email', 'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function loans(){
        return $this->hasMany(Loan::class);
    }
}
