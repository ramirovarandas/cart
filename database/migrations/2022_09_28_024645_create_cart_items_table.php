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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('cart')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('sku', 40);
            $table->string('name', 100);
            $table->unsignedMediumInteger('quantity');
            $table->unsignedDecimal('price');
            $table->timestamps();

            $table->unique(['cart_id', 'sku'], 'idx_cart_items_001');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
