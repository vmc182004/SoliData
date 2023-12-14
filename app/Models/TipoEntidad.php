<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TipoEntidad extends Model
{
    use HasFactory;
    
    public function segmentaciones():HasMany
    {
        return $this->hasMany(Segmentacion::class, 'tipo_entidad_id');
    }
}
