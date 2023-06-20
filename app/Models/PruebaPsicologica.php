<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaPsicologica extends Model
{
    use HasFactory;
    protected $table ="prueba_psicologica";
    protected $primaryKey ="id";
    public $timestamps = true;
    protected $fillable = ['nombre', 'tipo', 'edad_minima', "psicologo_id"];

    public function psicologo()
    {
        return $this->belongsTo(Psicologo::class);
    }
}
