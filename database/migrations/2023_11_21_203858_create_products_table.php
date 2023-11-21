<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('category_id');
            $table->string('name', 100);
            $table->string('brand', 30);
            $table->string('code', 20);
            $table->string('description', 256);
            $table->integer('price');
            $table->integer('new_price')->nullable();
            $table->tinyInteger('quantity');
            $table->string('color', 20);
            $table->integer('user_id');

            $table->timestamps();
            $table->softDeletes()->nullable();

            $table->string('photo', 100)->nullable();
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
