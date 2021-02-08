<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = "perfil";
    
    protected $fillable = [
        'nome', 'dtnasc', 'principal'
    ];

    public $timestamps = false;

    public function user(){
    	 return $this->belongsTo('App\User');
    }

    public function filmes(){
        return $this->hasMany('App\Filme');
   }


}
