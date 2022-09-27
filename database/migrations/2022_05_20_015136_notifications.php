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
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('notification_id');
            $table->integer('notification_sender_id')->nullable();
            $table->integer('notification_reciver_id')->nullable();
            $table->string('notification_type')->nullable();
            $table->integer('notification_everything_id')->nullable();
            $table->string('notification_everything_type')->nullable();
            $table->string('notification_message')->nullable();
            $table->integer('notification_read')->nullable();
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
        Schema::dropIfExists('notifications');

    }
};
