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
            $table->string('name', 100);
            $table->string('email', 50)->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 20);
            $table->tinyInteger('country_id');
            $table->string('city', 50);

            $table->timestamps();
            $table->softDeletes()->nullable();

            $table->string('password');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('role')->default(2);

            //$table->rememberToken();
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
