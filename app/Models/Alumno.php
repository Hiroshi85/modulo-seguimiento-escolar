<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Alumno extends Model
{
    use HasFactory;
    protected $table ="alumno";
    protected $primaryKey ="id";
    public $timestamps = true;
    protected $fillable = ['nombres', 'apellidos', "fechaNacimiento", "genero","apoderado_id"];

    public function apoderado()
    {
        return $this->belongsTo(Apoderado::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

    public function comportamientos()
    {
        return $this->hasMany(Comportamiento::class);
    }

    public function edad()
    {
        return Carbon::parse($this->attributes['fechaNacimiento'])->age;
    }
}
