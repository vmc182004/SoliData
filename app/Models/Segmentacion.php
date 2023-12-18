<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Segmentacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameSegmentacion',
        'mayor',
        'menor',
        'tipo_entidad_id'
    ];

   
    public function tipoEntidad():BelongsTo
    {
        return $this->belongsTo(TipoEntidad::class, 'tipo_entidad_id');
    }

    

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'segmentacion_id');
    }
}
