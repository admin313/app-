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
            $table->id();
            $table->string('username');
            $table->string('avatar')->default("/panel/asset/img/avatar.jpg")->nullable();
            $table->string('email')->unique();
            $table->string('phone',12)->nullable();
            $table->boolean('Check_phone')->default(0);
            $table->tinyInteger('age')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('Active_user')->default(0);
            $table->boolean('age_18')->default(0);
            $table->boolean('is_Admin')->default(0);
            $table->boolean('is_Staff')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
