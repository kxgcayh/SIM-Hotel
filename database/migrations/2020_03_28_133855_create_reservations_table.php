<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_reservations', function (Blueprint $table) {
            $table->bigIncrements('id_reservation');
            $table->foreignId('room_id');
            $table->foreign('room_id')->references('id_room')
                ->on('tr_rooms')->onDelete('cascade');
            $table->foreignId('booked_by');
            $table->foreign('booked_by')->references('id_user')
                ->on('ms_users')->onDelete('cascade');
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
        Schema::dropIfExists('tr_reservations');
    }
}
