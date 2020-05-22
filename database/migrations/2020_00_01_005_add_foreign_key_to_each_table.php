<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToEachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tr_cities', function (Blueprint $table) {
            $table->foreign('province_id')->references('id_province')
                ->on('ms_provinces')->onDelete('cascade');
        });

        Schema::table('tr_hotels', function (Blueprint $table) {
            $table->foreign('city_id')->references('id_city')
                ->on('tr_cities')->onDelete('cascade');
        });

        Schema::table('tr_rooms', function (Blueprint $table) {
            $table->foreign('hotel_id')->references('id_hotel')
                ->on('tr_hotels')->onDelete('cascade');
            $table->foreign('type_id')->references('id_type')
                ->on('ms_types')->onDelete('cascade');
        });

        Schema::table('tr_reservations', function (Blueprint $table) {
            $table->foreign('room_id')->references('id_room')
                ->on('tr_rooms')->onDelete('cascade');
            $table->foreign('booked_by')->references('id_user')
                ->on('ms_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tr_cities', function (Blueprint $table) {
            $table->dropForeign(['province_id']);
        });

        Schema::table('tr_hotels', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });

        Schema::table('tr_room_types', function (Blueprint $table) {
            $table->dropForeign(['facility_id']);
        });

        Schema::table('tr_rooms', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->dropForeign(['room_type_id']);
        });

        Schema::table('tr_reservations', function (Blueprint $table) {
            $table->dropForeign(['room_id']);
            $table->dropForeign(['booked_by']);
        });
    }
}
