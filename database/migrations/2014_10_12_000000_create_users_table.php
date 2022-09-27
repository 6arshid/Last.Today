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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->unique(); 
            $table->string('family')->nullable();
            $table->string('email')->nullable();
            $table->string('public_email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->longtext('about')->nullable();
            $table->string('job')->nullable();
            $table->string('bio')->nullable();
            $table->string('mobile')->nullable();
            $table->string('avatar')->default("/files/avatars/Multiavatar-last.today.png")->nullable();
            $table->longtext('address')->nullable();
            $table->string('public_emai')->nullable();
            $table->longtext('tronwallet')->nullable();
            $table->string('paypal')->nullable();
            $table->longtext('others')->nullable();
            $table->string('url')->nullable();
            $table->string('color')->nullable();
            $table->string('backgroundimage')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('reddit')->nullable();
            $table->string('wechat')->nullable();
            $table->string('kuaishou')->nullable();
            $table->string('qzone')->nullable();
            $table->string('quora')->nullable();
            $table->string('skype')->nullable();
            $table->string('github')->nullable();
            $table->string('twitch')->nullable();
            $table->string('wikipedia')->nullable();
            $table->longtext('uniqid')->nullable();
            $table->string('domain')->nullable();
            $table->string('logo')->nullable();
            $table->string('language')->nullable();
            $table->string('theme')->nullable()->default(1);
            $table->integer('suspend')->nullable();
            $table->integer('is_admin')->nullable();
            $table->integer('pv')->default(0)->nullable();
            $table->string('social_id')->nullable();
            $table->string('social_type')->nullable();
            $table->string('metamask_login_wallet')->nullable();
            $table->integer('verify')->nullable();
            $table->string('first_register_ip')->nullable();
            $table->string('ref')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
