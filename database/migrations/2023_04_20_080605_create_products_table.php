<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name', 100);
            $table->integer('price');
            $table->integer('sale_price');
            $table->integer('quantity');
            $table->bigInteger('status')->default(1);
            $table->text('description')->nullable();
            $table->string('image', 255);
            $table->bigInteger('classify_id')->unsigned();
            $table->foreign('classify_id')->references('id')->on('classifies');
            $table->bigInteger('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('authors');
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
};
