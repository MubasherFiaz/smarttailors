<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer('tailor_id');             
            $table->string("custumer_id");
            $table->text("categories");
            $table->string("note")->nullable();;
            $table->string("total_payment");
            $table->string("payment_received")->nullable();
            $table->string("invoice_no");
            $table->string("o_status");
            $table->date("delivery_date"); 
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
        Schema::dropIfExists('orders');
    }
}
