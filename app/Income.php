<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'date', 'amount', 'description',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
