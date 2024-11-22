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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('category_produk_id');
            $table->foreign('category_produk_id')->references('id')->on('category_produks')->onDelete('cascade');
            $table->string('item_code')->unique();
            $table->string('nomor_ido')->unique();
            $table->string('serial_number_awal')->unique();
            $table->string('serial_number_akhir')->unique();
            $table->string('name');
            $table->integer('total_dikirim');
            $table->date('waktu_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
