<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkbsvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tkbsv', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('thu');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('phong_id');
            $table->unsignedBigInteger('monhoc_id')->nullable();
            $table->unsignedBigInteger('tiet_id');
            $table->unsignedBigInteger('hocky_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('phong_id')->references('id')->on('phong');
            $table->foreign('monhoc_id')->references('id')->on('monhoc');
            $table->foreign('tiet_id')->references('id')->on('tiet');
            $table->foreign('hocky_id')->references('id')->on('hocky');

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
        Schema::dropIfExists('tkbsv');
    }
}
