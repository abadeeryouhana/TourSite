<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_tours', function (Blueprint $table) {
            $table->integer('c_id');
            $table->integer('t_id');
            $table->integer('numberOfPassengers');
            $table->dateTime('dateOfbooking');
            $table->float('totalCost');
            $table->tinyInteger('progress');
            $table->foreign('c_id')->references('id')->on('customers');
            $table->foreign('t_id')->references('id')->on('tours');
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
        Schema::dropIfExists('customer_tours');
    }
}
