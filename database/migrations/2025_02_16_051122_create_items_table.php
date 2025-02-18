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
        Schema::create('items', function (Blueprint $table) {// Membuat tabel baru bernama 'items'
            $table->id();// Membuat kolom 'id' sebagai primary key auto-increment
            $table->string('name');// Membuat kolom 'name' dengan tipe VARCHAR
            $table->text('description');// Membuat kolom 'description' dengan tipe TEXT
            $table->timestamps();// Membuat kolom 'created_at' dan 'updated_at' untuk timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // Method yang dijalankan saat migrasi dibatalkan (php artisan migrate:rollback)
    {
        Schema::dropIfExists('items');// Menghapus tabel 'items' jika ada
    }
};
