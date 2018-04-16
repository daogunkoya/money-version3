<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('title');
             $table->string('name')->nullable();;
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('dob');
            $table->string('email');
            $table->string('phone');
            $table->string('mobile');
            $table->string('postcode');
            $table->string('address');
            $table->integer('address_id');
            $table->string('photo_id');
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
        Schema::dropIfExists('agent_customer');
    }
}
