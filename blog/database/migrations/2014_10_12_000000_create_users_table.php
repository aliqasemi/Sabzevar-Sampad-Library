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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('father_name')->nullable();
            $table->text('address')->nullable();
            $table->text('father_job')->nullable();
            $table->bigInteger('mobile_number');
            $table->bigInteger('father_mobile_number')->nullable();
            $table->date('registery_date');
            $table->date('expiration_date')->nullable();
            $table->smallInteger('grade');
            $table->boolean('ban_status');
            $table->smallInteger('banded_times')->default(0);
            $table->string('user_type')->default('user') ;
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
