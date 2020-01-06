<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('gender');
            $table->string('password');
            $table->string('address');
            $table->string('role')->default("member");
            $table->string('picture');
            $table->rememberToken()->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
