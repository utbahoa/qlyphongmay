<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToThoikhoabieuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thoikhoabieu', function (Blueprint $table) {
            $table->unsignedBigInteger('hocky_id')->nullable();
            $table->foreign('hocky_id')->references('id')->on('hocky');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thoikhoabieu', function (Blueprint $table) {
            $table->dropForeign(['hocky_id']);
            $table->dropColumn(['hocky_id']);
        });
    }
}
