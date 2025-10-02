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
            $table->string('product_image')->nullable();
            $table->decimal('product_cost', 15, 2)->nullable();  // giá gốc
            $table->decimal('product_price', 15, 2);             // giá bán
            $table->text('description')->nullable();             // mô tả sản phẩm
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
