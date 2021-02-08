<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $table = "filme";
    
    protected $fillable = [
        'id_filme', 'assistido'
    ];

    public $timestamps = false;

    public function perfil(){
    	 return $this->belongsTo('App\Perfil');
    }


}
