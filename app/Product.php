<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'products';

    public function category() {
        $this->belongsTo('App\Product_category', 'category_id');
    }

    public function contracts() {
        $this->belongsToMany('App\Contract');
    }

}
