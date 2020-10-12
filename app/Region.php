<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';
    
    public function communes(){
        return $this->hasMany('App\Commune');
    }
}
