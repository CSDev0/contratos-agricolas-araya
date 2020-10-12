<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model {

    protected $table = 'contracts';
    protected $fillable = [
        'inscription_number', 
        'buyer_name', 
        'buyer_rut',
        'seller_name',
        'seller_rut',
        'start_date',
        'end_date',
        'observations',
        'file_id'
        ];

    //Relacion un contrato tiene un archivo.
    public function files() {
        return $this->hasOne('App\File', 'file_id');
    }

    //Relacion muchos contratos tienen muchos productos
    public function products() {
        return $this->belongsToMany('App\Product');
    }
    
    //Relacion muchos contratos tienen muchas comunas.
    public function communes(){
        return $this->belongsToMany('App\Commune');
    }
    
    public function farms(){
        return $this->hasMany('App\Farm');
    }

}
