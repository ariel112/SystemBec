<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombre',150);
            $table->String('lugar',250);
            $table->integer('horas');
            $table->date('inicio');
            $table->date('final');
            $table->enum('estado',['Activo','Desactivo'])->default('Activo');
            $table->timestamps();
            
        });



        Schema::create('becarios_actividades', function(blueprint $table){
            $table->increments('id');
            $table->integer('becario_id')->unsigned();
            $table->integer('voluntariado_id')->unsigned();
            $table->foreign('becario_id')->references('id')->on('becarios');
            $table->foreign('voluntariado_id')->references('id')->on('voluntariados');
            
            $table->timestamps();
        });
    }
//necesito hacer una tabla intermedia entre actividades y becarios
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades');
    }
}
