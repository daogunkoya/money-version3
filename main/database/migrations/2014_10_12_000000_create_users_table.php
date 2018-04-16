<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->string('dob');
            $table->string('phone');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo_id')->default(0);
            $table->integer('address_id')->default(0);
            $table->integer('is_active')->default(0);
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
        Schema::dropIfExists('users');
    }
}
