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
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('message_id');
            $table->integer('message_owner')->nullable();
            $table->bigInteger('message_receiver_id');
            $table->bigInteger('message_sender_id');
            $table->longtext('message_content');
            $table->integer('message_read')->nullable();
            $table->integer('message_sender_delete')->nullable();
            $table->integer('message_receiver_delete')->nullable();
            $table->integer('message_anything_id')->nullable();
            $table->string('message_anything_type')->nullable();
            $table->text('message_uniqid')->nullable();
            $table->string('message_anything_type')->nullable();
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
        Schema::dropIfExists('messages');
    }
};
