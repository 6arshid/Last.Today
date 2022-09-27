<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->bigInteger('comment_anything_id');
            $table->string('comment_anything_type')->nullable();
            $table->bigInteger('comment_parrent_id')->nullable();
            $table->bigInteger('comment_like')->nullable();
            $table->bigInteger('comment_dislike')->nullable();
            $table->longText('comment_body')->nullable();
            $table->bigInteger('comment_user_id');
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
        Schema::dropIfExists('comments');
    }
}
