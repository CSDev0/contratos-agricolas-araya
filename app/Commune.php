<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $table = 'communes';
    
    public function region(){
        return $this->belongsTo('App\Region', 'region_id');
    }
    
    public function contracts(){
        return $this->belongsToMany('App\Contract');
    }
}
