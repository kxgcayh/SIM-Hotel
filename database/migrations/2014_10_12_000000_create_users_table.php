<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_users', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('telp')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at');
            $table->rememberToken();
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
        Schema::dropIfExists('ms_users');
    }
}
