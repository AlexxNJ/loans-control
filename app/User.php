<?php

namespace App;

use App\Loan;
use App\Group;
use App\Income;
use App\Wallet;
use App\Expense;
use App\Customer;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'email', 'password',];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = ['email_verified_at' => 'datetime',];


    public function groups(){
        return $this->hasMany(Group::class);
    }

    public function customers(){
        return $this->hasMany(Customer::class);
    }

    public function loans(){
        return $this->hasMany(Loan::class);
    }

    public function wallets(){
        return $this->hasMany(Wallet::class);
    }

    public function incomes(){
        return $this->hasMany(Income::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }
}
