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
        Schema::create('lives', function (Blueprint $table) {
            $table->increments('live_id');
            $table->integer('live_user_id');
            $table->string('live_title');
            $table->longtext('live_content');
            $table->longtext('live_description')->nullable();
            $table->string('live_image');
            $table->longText('live_slug');
            $table->string('live_source_name')->nullable();
            $table->string('live_source_url')->nullable();
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
        Schema::dropIfExists('lives');

    }
};
