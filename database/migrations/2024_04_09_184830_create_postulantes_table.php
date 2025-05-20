<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulantes', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_Usuario');
            $table->string('ruta_imagen_e', 2048)->nullable();
            $table->date('fecha_de_nacimiento')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('habilidades')->nullable();
            $table->integer('puntos')->nullable();
            $table->boolean('estado')->nullable();

            $table->unsignedBigInteger('ID_Fuente_De_Contratacion')->nullable();
            $table->unsignedBigInteger('ID_Puesto_Disponible')->nullable(); 
            $table->unsignedBigInteger('ID_Idioma')->nullable(); 
            $table->unsignedBigInteger('ID_NivelIdioma')->nullable(); 
            $table->foreign('ID_Fuente_De_Contratacion')->references('id')->on('fuentes_de_contratacion')->onDelete('set null');
            $table->foreign('ID_Puesto_Disponible')->references('id')->on('puestos_disponibles')->onDelete('set null');
            $table->foreign('ID_Idioma')->references('id')->on('idiomas')->onDelete('set null');
            $table->foreign('ID_NivelIdioma')->references('id')->on('nivel_idioma')->onDelete('set null');

            $table->foreign('ID_Usuario')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulantes');
    }
};
