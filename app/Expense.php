<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'date', 'amount', 'description',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
