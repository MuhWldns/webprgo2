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
            $table->id();
            $table->string('name'); // nama produk
            $table->text('description')->nullable(); // deskripsi produk
            $table->decimal('price', 12, 2); // harga produk, bisa jutaan
            $table->integer('stock')->default(0); // stok produk
            $table->string('size')->nullable(); // ukuran (S, M, L, XL)
            $table->string('color')->nullable(); // warna
            $table->string('image')->nullable(); // path gambar
            $table->timestamps(); // created_at, updated_at
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
