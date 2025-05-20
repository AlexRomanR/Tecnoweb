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
        Schema::create('empleados', function (Blueprint $table) {
            $table->string('ruta_imagen_e', 2048)->nullable();
            $table->string('genero')->nullable();
            $table->string('estadocivil')->nullable();
            $table->date('fechanac')->nullable();
            $table->unsignedBigInteger('ID_Sueldo')->nullable();
            $table->foreign('ID_Sueldo')->references('id')->on('sueldo')->onDelete('set null');
            $table->unsignedBigInteger('ID_Usuario');
            $table->foreign('ID_Usuario')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('ID_Departamento')->nullable();
            $table->foreign('ID_Departamento')->references('id')->on('departamentos')->onDelete('set null');
            $table->unsignedBigInteger('ID_Cargo')->nullable();
            $table->foreign('ID_Cargo')->references('id')->on('cargos')->onDelete('set null');
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
        Schema::dropIfExists('empleados');
    }
};
