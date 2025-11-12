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
        Schema::create('autorizaciones_inscripcion_h_s', function (Blueprint $table) {
            $table->id();
            $table->string('periodo',5);
            $table->string('no_de_control',10);
            $table->string('tipo_de_autorizacion',2);
            $table->string('motivo_autorizacion',100)->nullable();
            $table->string('quien_autoriza',35)->nullable();
            $table->dateTime('fecha_hora_autoriza')->nullable();
            $table->string('materia_afectada',100)->nullable();
            $table->integer('cantidad')->nullable();
            $table->timestamps();
           

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorizaciones_inscripcion_h_s');
    }
};
