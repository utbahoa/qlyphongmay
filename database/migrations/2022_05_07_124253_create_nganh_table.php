<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNganhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //id, nganh_ten, khoa_id
        //id, khoa_ten
        Schema::create('nganh', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nganh_ten');
            $table->unsignedBigInteger('khoa_id');
            $table->timestamps();

            $table->foreign('khoa_id')->references('id')->on('khoa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nganh');
    }
}
