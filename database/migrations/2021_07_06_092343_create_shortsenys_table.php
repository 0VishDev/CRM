<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortsenysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortsenys', function (Blueprint $table) {
            $table->id();
            $table->string("buy_sell");
            $table->string("product_name");
            $table->string("moq");
            $table->string("quality_size_specy");
            $table->string("sale_purchase");
            $table->string("req_frequency");
            $table->string("packaging_size");
            $table->string("payment_term");
            $table->string("purpose_of_req");
            $table->string("delivery_place");
            $table->string("location");
            $table->longText("descp");
            
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
        Schema::dropIfExists('shortsenys');
    }
}
