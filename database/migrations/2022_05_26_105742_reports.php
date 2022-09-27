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
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('report_id');
            $table->text('report_problem');
            $table->text('report_message')->nullable();
            $table->bigInteger('report_submit_report_user_id');
            $table->bigInteger('report_reported_user_id');
            $table->text('report_reported_user_answer_report')->nullable();
            $table->string('uniqid')->nullable();
            $table->timestamps();
        });
        Schema::create('reports_conversations', function (Blueprint $table) {
            $table->increments('report_c_id');
            $table->bigInteger('report_c_report_id');
            $table->bigInteger('report_c_creator_id');
            $table->text('report_c_message')->nullable();
            $table->bigInteger('report_c_submit_report_user_id');
            $table->bigInteger('report_c_reported_user_id');
            $table->string('uniqid')->nullable();
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
        Schema::dropIfExists('reports');
        Schema::dropIfExists('reports_conversations');
    }
};
