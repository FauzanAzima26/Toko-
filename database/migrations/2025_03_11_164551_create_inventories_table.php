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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('nama_produk');
            $table->string('spesifikasi');
            $table->string('image');
            $table->string('satuan');
            $table->integer('harga_jual');
            $table->timestamps();
        });

        // Mengubah kolom satuan menjadi ENUM
        Schema::table('inventories', function (Blueprint $table) {
            // Drop kolom satuan yang lama
            $table->dropColumn('satuan');
        });

        // Menambahkan kolom satuan baru dengan tipe ENUM
        Schema::table('inventories', function (Blueprint $table) {
            $table->enum('satuan', ['pcs', 'kg', 'liter', 'meter'])->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');

        // Mengembalikan kolom satuan ke string jika rollback
        Schema::table('inventories', function (Blueprint $table) {
            $table->string('satuan')->after('image');
        });
    }
};
