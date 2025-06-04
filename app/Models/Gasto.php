<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Gasto extends Model
{
    use HasFactory;
    
    protected $fillable = ['concepto', 'cantidad', 'fecha'];
    
    public function personas() : BelongsToMany
    {
        return $this->belongsToMany(Persona::class)
            ->withPivot('cantidad')
            ->withTimestamps();
    }
}
