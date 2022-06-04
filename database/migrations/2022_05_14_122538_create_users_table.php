<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('name');
            $table->date('birthday');
            $table->string('tel');
            $table->integer('gender');
            $table->integer('status');
            $table->unsignedBigInteger('lop_id')->nullable;
            $table->unsignedBigInteger('quyen_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('lop_id')->references('id')->on('lop');
            $table->foreign('quyen_id')->references('id')->on('quyen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
