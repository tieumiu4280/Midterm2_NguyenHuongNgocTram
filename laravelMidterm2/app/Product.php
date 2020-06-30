<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['id','name','id_type','description','unit_price','promotion_price','image','unit','new'];
}
