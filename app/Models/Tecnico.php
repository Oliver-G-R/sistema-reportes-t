<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tecnico extends Model
{
    //
    protected $fillable = [
        "nombre",
        "apellido",
        "telefono",
        "area"
    ];


    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }
}
