<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title');
            $table->string('header_movie');
            $table->string('us_title');
            $table->string('us_sub');
            $table->string('us_link');
            $table->string('service_title');
            $table->string('service_sub');
            $table->string('service_link');
            $table->string('service_one_title');
            $table->string('service_one_sub');
            $table->string('service_tow_title');
            $table->string('service_tow_sub');
            $table->string('service_three_title');
            $table->string('service_three_sub');
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
        Schema::dropIfExists('generals');
    }
}
