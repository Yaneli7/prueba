<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
   protected $fillable = ['nombre','ape_paterno','ape_materno','edad'];

   	public function direcciones(){
     	return $this->hasMany('App\Usuario', 'id_usuario');
    }
}
