<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table ="alumno";
    protected $primaryKey ="id";
    public $timestamps = true;
    protected $fillable = ['nombres', 'apellidos', 'edad', "fechaNacimiento", "genero","apoderado_id"];

    public function apoderado()
    {
        return $this->belongsTo(Apoderado::class);
    }

    public function asistencia()
    {
        return $this->hasMany(Asistencia::class);
    }
}
