<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('logo');
            $table->string('phone');
            $table->longText('address');
            $table->string('opening_time')->default('9:00 AM - 5:00 PM');
            $table->string('opening_day')->default('Monday - Sunday');
            $table->string('deliver_time');
            $table->foreignId('township_id')->references('id')->on('townships')->onDelete('cascade');
            $table->foreignId('cuisine_id')->references('id')->on('cuisines')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('restaurants');
    }
}
