<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Persona extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'apellido'];
    
    public function gastos() : BelongsToMany
    {
        return $this->belongsToMany(Gasto::class)
            ->withPivot('cantidad')
            ->withTimestamps();
    }
}
