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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('carnet')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo')->unique()->nullable();
            $table->string('celular');
            $table->string('direccion')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');

            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->timestamps();

            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
