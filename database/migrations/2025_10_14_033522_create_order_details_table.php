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
        Schema::create('order_details', function (Blueprint $table) {
        $table->id('order_detail_id');//khóa chính của order_detail
        $table->string('order_id'); // trùng với order_id trong bảng orders
        $table->unsignedBigInteger('product_id');
        $table->integer('quantity');
        $table->decimal('price', 10, 2);
        $table->timestamps();

        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
