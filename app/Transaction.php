<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $primaryKey = "trans_id";


    //Transaction may contain many cart items
    public function cart(){
        return $this->hasMany(Cart::class, 'trans_id');
    }
}
