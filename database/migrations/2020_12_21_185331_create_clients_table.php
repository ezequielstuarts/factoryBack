<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nulleable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('surname');
            $table->string('street');
            $table->string('floor');
            $table->integer('phone1');
            $table->integer('phone2');
            $table->string('email')->nulleable();
            $table->integer('dni');
            $table->integer('cuit');
            $table->unsignedBigInteger('city_id');
            $table->enum('gender', ["Masculino", "Femenino", "No definido"])->nulleable();
            $table->integer('ranking');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('modified_by');            
            $table->foreign('modified_by')->references('id')->on('users');
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
        Schema::dropIfExists('clients');
    }
}
