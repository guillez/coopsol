<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
       protected $fillable = ['descripcion','direccion','email','telefono','celular'];

}
