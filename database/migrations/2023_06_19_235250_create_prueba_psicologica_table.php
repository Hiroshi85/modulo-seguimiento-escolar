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
        Schema::create('prueba_psicologica', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("tipo");
            $table->unsignedBigInteger('edad_minima')->nullable();
            $table->unsignedBigInteger('edad_maxima')->nullable();

            $table->unsignedBigInteger('psicologo_id')->nullable();
            $table->foreign('psicologo_id')
                ->references('id')
                ->on('psicologo')
                ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prueba_psicologica');
    }
};
