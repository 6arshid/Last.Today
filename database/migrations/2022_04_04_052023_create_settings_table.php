<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('settings_logo')->default('images/logo.png')->nullable();
            $table->longText('settings_unregistered_names')->nullable();
            $table->string('settings_total_view')->default('1')->nullable();
            $table->string('destination_address')->default('TLVgu5Sa5jEbJPbbut3LsLFqXDdgtSgZHj');
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
        Schema::dropIfExists('settings');
    }
}
