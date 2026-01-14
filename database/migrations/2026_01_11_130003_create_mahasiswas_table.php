<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama');
            $table->year('angkatan');

            // Kolom FK HARUS sama tipe dengan prodis.id dan dosens.id
            $table->unsignedBigInteger('prodi_id');
            $table->unsignedBigInteger('dosen_id');

            $table->string('foto')->nullable();
            $table->timestamps();

            // Foreign key manual (lebih stabil)
            $table->foreign('prodi_id')
                  ->references('id')
                  ->on('prodis')
                  ->onDelete('cascade');

            $table->foreign('dosen_id')
                  ->references('id')
                  ->on('dosens')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
