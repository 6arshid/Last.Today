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
        Schema::create('searchengineresults', function (Blueprint $table) {
            $table->increments('ser_id');
            $table->longtext('ser_url')->nullable();
            $table->longtext('ser_url_title')->nullable();
            $table->string('ser_source')->nullable();
            $table->string('ser_query')->nullable();
            $table->longtext('ser_description')->nullable();
            $table->text('ser_keywords')->nullable();
            $table->string('ser_category')->nullable();
            $table->integer('ser_family_age')->nullable();
            $table->integer('ser_verify')->nullable();
            $table->string('ser_lang')->nullable();
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
        Schema::dropIfExists('searchengineresults');
    }
};
