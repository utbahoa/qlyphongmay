<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdangkyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdangky', function (Blueprint $table) {
            $table->unsignedBigInteger('danhsach_id');
            $table->unsignedBigInteger('phong_id');
            $table->unsignedBigInteger('may_id'); 

            $table->foreign('danhsach_id')->references('id')->on('danhsachdangky');
            $table->foreign('phong_id')->references('id')->on('phong');
            $table->foreign('may_id')->references('id')->on('may');

            $table->primary(['danhsach_id', 'phong_id', 'may_id']);
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
        Schema::dropIfExists('chitietdangky');
    }
}
