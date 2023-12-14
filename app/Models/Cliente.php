<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasMany(User::class, 'nit');
    }

    public function segmentacion():BelongsTo
    {
        return $this->belongsTo(Segmentacion::class);
    }
    
}

