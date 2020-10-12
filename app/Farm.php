<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $table = 'farms';
    
    protected $fillable = ['roll', 'contract_id'];
    
     public $timestamps = false;
     
    public function contract(){
        return $this->belongsTo('App\Contract');
    }
}
