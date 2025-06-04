<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Persona extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre'];
    
    public function gastos() : BelongsToMany
    {
        return $this->belongsToMany(Gasto::class);
    }
}
