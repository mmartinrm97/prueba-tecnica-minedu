<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocenteJubilado extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'docente_jubilado';

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'modificado_en';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function estadoDocente(){
        return $this->belongsTo(EstadoDocente::class, 'estado_docente_id');
    }
}
