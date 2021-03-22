<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->boolean('status')->default(0)->after('link');
            // $table->enum('for', ['utama', 'promosi','produk'])->default(['utama'])->after('status');
            $table->enum('for', ['utama', 'promosi', 'produk'])->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('for');
        });
    }
}
