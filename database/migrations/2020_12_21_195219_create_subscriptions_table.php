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
            $table->datetime('request_date')->nullable();
            $table->datetime('change_state_date')->nullable();
            $table->datetime('request_installation_date')->nullable();
            $table->datetime('installation_date')->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->boolean('stopdebit')->default(0);
            $table->boolean('in_payment_process')->default(0);
            $table->datetime('verification_date')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('serial_number_2')->nullable();
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
