<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('may', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('may_ten');
            $table->unsignedBigInteger('phong_id');
            $table->integer('may_tinhtrang');
            $table->timestamps();

            $table->foreign('phong_id')->references('id')->on('phong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('may');
    }
}
