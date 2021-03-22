<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_apps', function (Blueprint $table) {
            $table->id();
            $table->string('link_twitter');
            $table->string('link_fb');
            $table->string('link_ig');
            $table->string('link_yt');
            $table->string('no_telp');
            $table->string('no_wa');
            $table->string('email');
            $table->string('alamat');

            $table->softDeletes();
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
        Schema::dropIfExists('setting_apps');
    }
}
