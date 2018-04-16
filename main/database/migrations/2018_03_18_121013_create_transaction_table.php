<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('receipt_number');
            $table->string('type');
            $table->string('user_id');
            $table->string('customer_id');
            $table->string('sender_name');
            $table->string('receiver_id');
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->double('amount');
            $table->double('commission');
            $table->double('agent_commission');
            $table->double('exchange_rate');
            $table->string('transfer_type');
            $table->string('bank');
            $table->string('account_number');
            $table->string('identity');
            $table->string('note');
            $table->string('status');
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
        Schema::dropIfExists('transaction');
    }
}
