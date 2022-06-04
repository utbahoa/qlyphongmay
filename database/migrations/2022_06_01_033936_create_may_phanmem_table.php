<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMayPhanmemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('may_phanmem', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('may_id');
            $table->unsignedBigInteger('phanmem_id');
            $table->timestamps();

            $table->foreign('may_id')->references('id')->on('may');
            $table->foreign('phanmem_id')->references('id')->on('phanmem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('may_phanmem');
    }
}
