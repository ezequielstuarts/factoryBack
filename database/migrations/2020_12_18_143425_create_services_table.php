<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_service')->nullable();
            $table->decimal('monthly_price', 10,2)->nullable();
            $table->tinyInteger('months_change')->nullable();
            $table->decimal('unique_price', 10,2)->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('subscription')->default(0);
            $table->integer('type')->nullable();
            $table->unsignedBigInteger('servicec_id')->nullable();
            $table->foreign('servicec_id')->references('id')->on('services_c');
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
        Schema::dropIfExists('services');
    }
}
