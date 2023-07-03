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
        Schema::create('auxiliar', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono')->nullable();
            $table->char('genero',1);
            $table->string('correo')->unique();

            $table->unsignedBigInteger('user_id')->nullable();
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auxiliar');
    }
};
