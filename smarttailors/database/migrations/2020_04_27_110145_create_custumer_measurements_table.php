<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustumerMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custumer_measurements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('custumer_id');
            $table->integer('measurement_part_id');
            $table->integer('measurement_category_id');
            $table->integer('created_by');
            $table->text('measurement');

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
        Schema::dropIfExists('custumer_measurements');
    }
}
