<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Figure extends Model
{
    protected $table = 'figures';
    protected $primaryKey = 'fig_id';
    public $timestamps = false;

    //Figure has a maximum of one category to point to
    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }

    //Figure can be used by many cart
    public function cart(){
        return $this->hasMany(Cart::class, 'cart_id');
    }

}
