<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $fillable = ['path', 'type'];
    public $timestamps = false;
    
    public function contract(){
        return $this->belongsTo('App\Contract');
    }
}
