<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'total',
        'user_id',
    ];

    public function usuario(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function detalles(){
        return $this->hasMany(Detalle::class);
    }
}
