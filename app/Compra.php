<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = ['usuario_id','canasta_id','cantidad', 'monto','confirmada'];


    public function canasta()
    {
        return $this->belongsTo(Canasta::class);
    }

}
