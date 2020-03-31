<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_hotels', function (Blueprint $table) {
            $table->bigIncrements('id_hotel');
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id_city')
                ->on('tr_cities')->onDelete('cascade');            
            $table->string('name');
            $table->string('slug');
            $table->string('address');
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
        Schema::dropIfExists('tr_hotels');
    }
}
