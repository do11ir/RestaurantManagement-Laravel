<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products_baskets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('foods_id')->nullable();
            $table->foreign('foods_id')->references('id')->on('food');
            $table->unsignedBigInteger('basket_id');
            $table->foreign('basket_id')->references('id')->on('baskets');
            $table->integer('count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_baskets');
    }
};
