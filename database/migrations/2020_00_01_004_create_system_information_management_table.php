<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemInformationManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Province Table
        Schema::create('ms_provinces', function (Blueprint $table) {
            $table->bigIncrements('id_province');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        // City Table
        Schema::create('tr_cities', function (Blueprint $table) {
            $table->bigIncrements('id_city');
            $table->foreignId('province_id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        // Hotel Table
        Schema::create('tr_hotels', function (Blueprint $table) {
            $table->bigIncrements('id_hotel');
            $table->foreignId('city_id');
            $table->string('name');
            $table->string('slug');
            $table->string('address');
            $table->timestamps();
        });

        // Room Facility Table
        Schema::create('ms_room_facilities', function (Blueprint $table) {
            $table->bigIncrements('id_facility');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        // Room Type Table
        Schema::create('tr_room_types', function (Blueprint $table) {
            $table->bigIncrements('id_room_type');
            $table->foreignId('facility_id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        // Room Table
        Schema::create('tr_rooms', function (Blueprint $table) {
            $table->bigIncrements('id_room');
            $table->foreignId('hotel_id');
            $table->foreignId('room_type_id');
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('price');
            $table->timestamps();
        });

        // Reservation Table
        Schema::create('tr_reservations', function (Blueprint $table) {
            $table->bigIncrements('id_reservation');
            $table->foreignId('room_id');
            $table->foreignId('booked_by');
            $table->integer('total_night');
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
        // Drop Province Table
        Schema::dropIfExists('ms_provinces');

        // Drop City Table
        Schema::dropIfExists('tr_cities');

        // Drop Hotel Table
        Schema::dropIfExists('tr_hotels');

        // Drop Room Facility Table
        Schema::dropIfExists('ms_room_facilities');

        // Drop Room Type Table
        Schema::dropIfExists('tr_room_types');

        // Drop Room Table
        Schema::dropIfExists('tr_rooms');

        // Drop Reservation Table
        Schema::dropIfExists('tr_reservations');
    }
}
