<?php

namespace App;

use App\Loan;
use App\User;
use App\Group;
use App\Payment;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'phone_number', 'email', 'status'
    ];

    public function group(){
        return $this->belongsTo(Group::class);
    }

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
