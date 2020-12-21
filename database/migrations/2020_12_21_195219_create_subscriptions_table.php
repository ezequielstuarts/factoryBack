<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->datetime('request_date')->nulleable();
            $table->datetime('change_state_date')->nulleable();
            $table->datetime('request_installation_date')->nulleable();
            $table->datetime('installation_date')->nulleable();
            $table->decimal('price',10,2)->nulleable();
            $table->boolean('stopdebit')->default(0);
            $table->boolean('in_payment_process')->default(0);
            $table->datetime('verification_date')->nullable();
            $table->string('serial_number')->nulleable();
            $table->string('serial_number_2')->nulleable();
            $table->boolean('active')->default(1);
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');
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
        Schema::dropIfExists('subscriptions');
    }
}
