<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhsachdangkyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhsachdangky', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tiet_id');
            $table->unsignedBigInteger('phanmem_id');
            $table->unsignedBigInteger('phong_id');
            $table->integer('danhsach_soluong')->nullable();
            $table->datetime('danhsach_thoigiandk')->nullable();
            $table->integer('danhsach_tinhtrang');
            $table->string('danhsach_nguoiduyet')->nullable();
            $table->datetime('danhsach_thoigianduyet')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tiet_id')->references('id')->on('tiet');
            $table->foreign('phanmem_id')->references('id')->on('phanmem');
            $table->foreign('phong_id')->references('id')->on('phong');
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
        Schema::dropIfExists('danhsachdangky');
    }
}
