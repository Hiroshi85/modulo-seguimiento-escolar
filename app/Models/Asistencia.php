<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $table ="asistencia";
    protected $primaryKey ="id";
    public $timestamps = false;
    protected $fillable = ['fecha', 'tipo', 'alumno_id'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
