<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

	protected $fillable = ['id','descripcion', 'monto'];

	public function getDescripcionCopletaAttribute()
	{
	    return $this->descripcion.' - '.$this->monto.' $';
	}


}
