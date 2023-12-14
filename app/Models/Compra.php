<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',  // Agrega 'user_id' a la lista de campos llenables
        'product_id',
        'purchased',
    ];
    
    public function compras():HasMany
    {
        return $this->hasMany(Compra::class, 'product_id');
    }
}
