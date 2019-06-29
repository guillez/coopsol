<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

	protected $fillable = ['id','descripcion', 'monto','unidad', 'descripcioncompleta', 'proveedor_id'];

	public function getDescripcionCompletaAttribute()
	{
	    return $this->descripcion.' - '.$this->monto.' $';
	}

	public function getDescripcioncompleta()
	{
	    return $this->descripcion.' - '.$this->monto.' $';
	}
}
