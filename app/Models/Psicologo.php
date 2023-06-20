<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psicologo extends Model
{
    use HasFactory;
    protected $table ="psicologo";
    protected $primaryKey ="id";
    public $timestamps = true;
    protected $fillable = ['nombres', 'apellidos', 'telefono', "genero","correo"];

    public function pruebas()
    {
        return $this->hasMany(PruebaPsicologica::class);
    }
}
