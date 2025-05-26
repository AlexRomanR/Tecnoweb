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
        Schema::create('factura', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Usuario')->nullable();
          //  $table->unsignedBigInteger('ID_Estudiante_Curso')->nullable(); aca ira la relacion con estudiante_curso xddd
            $table->float('monto')->nullable();
            $table->foreign('ID_Usuario')->references('id')->on('users')->nullable();
           // $table->foreign('ID_estudiante_curso')->references('id')->on('users')->nullable();
        
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
        Schema::dropIfExists('factura');
    }
};
