<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $primaryKey = "cat_id";
    public $timestamps = false;

    //Category can be pointed by more than one figure
    public function figure(){
        return $this->hasMany(Figure::class, 'cat_id');
    }
}
