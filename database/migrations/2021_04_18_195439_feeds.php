<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Feeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->increments('feed_id')->autoIncrement();
            $table->string('feed_title');
            $table->longText('feed_url');
            $table->string('feed_lang')->nullable();
            $table->longText('feed_tags')->nullable();
            $table->string('feed_user_id')->nullable();
            $table->string('feed_image')->nullable();
            $table->string('feed_type')->nullable();
            $table->string('feed_category')->nullable();
            $table->string('feed_XPATH')->nullable();
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
        Schema::dropIfExists('feeds');
    }
}
