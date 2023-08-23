<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocenteJubilado extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'docente_jubilado';


    public function user(){
        return $this->belongsTo(User::class);
    }
}
