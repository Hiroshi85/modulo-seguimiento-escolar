<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asistencia', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->enum('tipo', ['presente', 'falta', 'tarde', 'justificado'])->default('falta');
            $table->unsignedBigInteger('alumno_id');
            
            $table->foreign('alumno_id')
            ->references('id')
            ->on('alumno')
            ->onDelete('restrict');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencia');
    }
};
