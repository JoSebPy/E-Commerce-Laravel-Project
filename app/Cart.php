<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";
    protected $primaryKey = "cart_id";
    public $timestamps = false;

    //One cart item can only belong to one user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //One cart item can only point to one figure
    public function figure(){
        return $this->belongsTo(Figure::class,  'fig_id');
    }

    //One cart item can only be used for one transaction
    public function transaction(){
        return $this->belongsTo(Transaction::class, 'trans_id');
    }

}
