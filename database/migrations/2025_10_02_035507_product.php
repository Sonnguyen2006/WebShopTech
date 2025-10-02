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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // khóa chính auto increment
            $table->string('product_id')->unique(); // mã sản phẩm (unique, không phải khóa chính)
            $table->string('product_name');
            $table->string('product_image')->nullable(false);
            $table->decimal('product_cost', 15, 2)->nullable(false);  // giá gốc
            $table->decimal('product_price', 15, 2);             // giá bán
            $table->text('description')->nullable(false);             // mô tả sản phẩm
            $table->text('category')->nullable(false);
            $table->tinyInteger('rating')->nullable(false);
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
