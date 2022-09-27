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
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('article_id');
            $table->string('article_type')->nullable();
            $table->string('article_title');
            $table->longText('article_content')->nullable();
            $table->string('article_image')->nullable();
            $table->longText('article_slug')->nullable();
            $table->longText('article_feedurl')->nullable();
            $table->string('article_user_id')->nullable();
            $table->bigInteger('article_view')->nullable();
            $table->string('article_lang',2)->nullable();
            $table->string('article_user_ip')->nullable();
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
        Schema::dropIfExists('articles');
    }
};
