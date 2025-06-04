<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GastoPersona extends Pivot
{
    protected $table = 'gasto_persona';

    protected $fillable = [
        'persona_id',
        'gasto_id',
    ];

    public $timestamps = false;

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }

    public function gasto(): BelongsTo
    {
        return $this->belongsTo(Gasto::class);
    }
}

