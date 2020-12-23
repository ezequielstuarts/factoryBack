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
            $table->string('adress');
            $table->string('floor')->nulleable();
            $table->integer('phone1');
            $table->integer('phone2')->nulleable();
            $table->string('email')->nulleable();
            $table->integer('dni')->nulleable();
            $table->integer('cuit')->nulleable();
            $table->unsignedBigInteger('city_id');
            $table->enum('gender', ["Masculino", "Femenino", "No definido"])->nulleable();
            $table->integer('ranking')->nulleable();
            $table->unsignedBigInteger('created_by')->nulleable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('modified_by')->nulleable();            
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
