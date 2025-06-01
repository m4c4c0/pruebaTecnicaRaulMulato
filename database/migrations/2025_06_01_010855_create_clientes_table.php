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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); //SERIA ID cliente
            $table->integer('cod_tipo_documento')->nullable();
            $table->string('dui_nit')->nullable();
            $table->string('nrc')->nullable();
            $table->string('nombre')->nullable(); //RAZON SOCIAL
            $table->string('nombre_comercial')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('region')->nullable(); //REFIERE AL PAIS
            $table->integer('id_tipo_contribuyente')->nullable(); //Tipo de contribuyente
            $table->integer('cod_actividad_economica')->nullable(); //GIRO
            $table->string('cod_departamento')->nullable();
            $table->string('cod_municipio')->nullable();
            $table->integer('tipo_persona')->nullable();
            $table->text('descripcion_adicional')->nullable();
            $table->integer('tipo_cliente')->nullable();//CONSUMIDOR, EMPRESA ETC
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
        Schema::dropIfExists('clientes');
    }
};
