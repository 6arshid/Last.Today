<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank', function (Blueprint $table) {
            $table->increments('bank_id');
            $table->bigInteger('bank_user_id');
            $table->string('bank_usdt_balance')->default(0);
            $table->string('bank_ltcoin_balance')->default(0.7);
            $table->timestamps();
        });
        Schema::create('users_bank_transactions', function (Blueprint $table) {
            $table->increments('ubt_id');
            $table->bigInteger('ubt_reciver_user_id');
            $table->bigInteger('ubt_sender_user_id');
            $table->bigInteger('ubt_amount')->default(1);
            $table->string('ubt_comment')->nullable();
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
        Schema::dropIfExists('bank');
        Schema::dropIfExists('users_bank_transactions');
    }
};
