<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',  // Agrega 'user_id' a la lista de campos llenables
        'product_id',
        'purchased',
    ];
    
}
