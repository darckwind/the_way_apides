<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('ubicasion');
            $table->boolean('suit');
            $table->boolean('doble');
            $table->boolean('single');
            $table->string('email')->unique();
            $table->string('contacto');
            //foreankey
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('motos',function (Blueprint $table){
            $table->increments('id');
            $table->string('marca');
            $table->string('modelo');
            $table->string('patente')->unique();
            $table->string('chasis')->unique();
            $table->string('motor')->unique();
            $table->integer('ano');
            //foreankey
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('hotels');
        Schema::dropIfExists('motos');
    }
}
