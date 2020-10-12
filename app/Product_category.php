<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    protected $table = 'product_categories';
    
    public function products(){
        $this->hasMany('App\Product');
    }
}
