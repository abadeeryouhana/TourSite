<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
			$table->string('name');
			$table->string('country');
			$table->string('city');
			$table->dateTime('startDate');
			$table->integer('duration');
			$table->float('cost',8,2);
			$table->string('transportationType');
			$table->string('notes');
<<<<<<< HEAD
            $table->integer('numberofRegisters');
=======
            $table->integer('numberofRegisters')->default(0);
>>>>>>> 6501441551ff466b17664ea005ef84dc56ae8594
            $table->integer('totalNumber');
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
        Schema::dropIfExists('tours');
    }
}
