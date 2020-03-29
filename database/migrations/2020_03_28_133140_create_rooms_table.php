<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_rooms', function (Blueprint $table) {
            $table->bigIncrements('id_room');
            $table->foreignId('hotel_id');
            $table->foreign('hotel_id')->references('id_hotel')
                ->on('tr_hotels')->onDelete('cascade');
            $table->integer('bedroom');
            $table->integer('bathroom');            
            $table->string('name');
            $table->boolean('wifi')->nullable();
            $table->boolean('launch')->nullable();
            $table->boolean('dinner')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_rooms');
    }
}
