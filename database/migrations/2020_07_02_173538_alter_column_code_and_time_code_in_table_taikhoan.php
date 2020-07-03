<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnCodeAndTimeCodeInTableTaikhoan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taikhoan', function (Blueprint $table) {
            $table ->string('code')->nullable()->index();
            $table ->timestamp('time_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taikhoan', function (Blueprint $table) {
            $table->dropColumn(['time_code','code']);
        });
    }
}
