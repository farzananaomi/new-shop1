<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->increments('id');
            $table->string('name')->default('')->nullable();
            $table->enum('role', ['super', 'admin', 'salesman', 'supplier', 'employee'])->default('admin')->nullable();
            $table->string('username')->nullable();
            $table->string('contact')->default('')->nullable();
            $table->string('additional_no')->default('')->nullable();
            $table->string('address')->default('')->nullable();
            $table->string('email')->default('')->nullable();
            $table->string('password')->nullable();

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
