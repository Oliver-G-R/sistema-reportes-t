<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reporte extends Model
{
    // campos que se pueden llenar

    protected $fillable = [
        "nombre",
        "descripcion",
        'departamento',
        "telefono",
        "fecha",
        "hora",
        "id_tecnico"
    ];


    public function tecnico(): BelongsTo
    {
        return $this->belongsTo(Tecnico::class);
    }
}
