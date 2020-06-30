<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "type_products";
    protected $fillable = ['id','name','description','image'];
}
