<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
protected $fillable = ['usuario_id','canasta_id', 'producto_id', 'cantidad', 'montounitario','montocantidad','montoacumulado','fechacarga'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

}
