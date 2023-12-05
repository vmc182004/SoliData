<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad',
        'productos',
        'precio',
        'pedido_id',
    ];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
