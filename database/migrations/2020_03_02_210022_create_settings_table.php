<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('system_name', 128);
            $table->string('logo', 128);
            $table->string('site_title', 128);
            $table->text('site_description');
            $table->text('profile_desc');
            $table->string('top_banner', 128);
            $table->string('side_banner', 128);
            $table->string('side_child_banner', 128);
            $table->string('footer_banner', 128);
            $table->text('facebook_fanspage');
            $table->string('facebook', 128);
            $table->string('twitter', 128);
            $table->string('youtube', 128);
            $table->string('instagram', 128);
            $table->string('carousel_img1', 128);
            $table->string('carousel_img2', 128);
            $table->string('carousel_img3', 128);
            $table->string('middle_banner', 128);
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
