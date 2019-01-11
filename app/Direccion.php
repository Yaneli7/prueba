<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    //
     protected $fillable = ['calle','colonia','delegacion','numero','id_usuario'];

     public function usuario(){
     	return $this->belongsTo('App\Usuario', 'id_usuario');
     	
     }
}
