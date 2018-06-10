<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_datos', function (Blueprint $table) {
            $table->unsignedInteger('id_tour_base');
            $table->string('cordenada_Salida');
            $table->string('cordenada_llegada');
            $table->unsignedInteger('id_hotel');
            //foreankey
            $table->foreign('id_tour_base')->references('id')->on('tour_bases');
            $table->foreign('id_hotel')->references('id')->on('hotels');
            //timestamps
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
        Schema::dropIfExists('tour_datos');
    }
}
