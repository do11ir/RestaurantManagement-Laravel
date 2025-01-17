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
        Schema::create('factors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phoneNumber');
            $table->double('totalPrice');
            $table->text('address');
            $table->text('orderDescribtion')->nullable();
            $table->string('admin_status')-> default('در حال آماده سازی');
            $table->unsignedBigInteger('basket_id');
            $table->foreign('basket_id')->references('id')->on('baskets');
            $table->string('restaurant_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factors');
    }
};
