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
    Schema::create('pages', function (Blueprint $table) {
        $table->id(); // Kolom ID
        $table->string('title'); // Kolom untuk judul halaman (Home, About, dll)
        $table->text('content'); // Kolom untuk konten halaman
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
