<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('uuid')->unsigned();
            $table->string('user_id');
            $table->string('emp_name');
            $table->string('data_sources');
            $table->string('company_name');
            $table->longText('address');
            $table->string('gst_no');
            $table->string('website_url');
            $table->string('established_year');

            $table->string('owner_ship');
            $table->string('business_type');
            $table->string('user_name');
            $table->string('designation');
            $table->string('email');
            $table->string('mobile_no');
            $table->timestamps();
        });
        DB::update("ALTER TABLE companies AUTO_INCREMENT = 10;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
