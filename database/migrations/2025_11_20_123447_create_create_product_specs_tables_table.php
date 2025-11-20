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
        Schema::create('product_specs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            
            // Các thông số chung
            $table->string('screen')->nullable();       // Màn hình
            $table->string('size')->nullable();         // Kích thước
            $table->string('weight')->nullable();       // Cân nặng
            $table->string('features')->nullable();     // Chức năng kèm theo
            $table->string('os')->nullable();           // Hệ điều hành
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_product_specs_tables');
    }
};
