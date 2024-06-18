<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('category_id');
            $table->integer('price');
            $table->integer('price_sale')->nullable();
            $table->text('image');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('hot')->default(0)->comment('1: Hot');
            $table->tinyInteger('display')->default(1)->comment('0: Ẩn | 1 : Hiện');
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
        Schema::dropIfExists('products');
    }
}
