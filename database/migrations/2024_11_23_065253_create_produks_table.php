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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('category_produk_id');
            $table->foreign('category_produk_id')->references('id')->on('category_produks')->onDelete('cascade');
            $table->unsignedBigInteger('category_daerah_id');
            $table->foreign('category_daerah_id')->references('id')->on('category_daerahs')->onDelete('cascade');
            $table->string('item_code')->unique();
            $table->string('name');
            $table->integer('total_dikirim');
            $table->integer('total_keluar')->nullable();
            $table->integer('total_produk');
            $table->date('waktu_masuk');
            $table->date('waktu_keluar')->nullable();
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
