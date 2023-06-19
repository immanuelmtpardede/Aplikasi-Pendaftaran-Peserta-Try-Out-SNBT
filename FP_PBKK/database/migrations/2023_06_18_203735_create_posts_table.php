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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->string("slug")->unique();
            $table->string('FotoDiri');
            $table->string('FotoKTP');         
            $table->string('Nama');
            $table->string('TempatLahir');
            $table->date('TanggalLahir');
            $table->string('JenisKelamin');
            $table->string('GolDarah');
            $table->string('Alamat');
            $table->string('Provinsi');
            $table->string('Kota');
            $table->string('Kecamatan');
            $table->string('Sekolah');
            $table->string('BerkasPendaftaran');
            $table->string('LokasiUjian');
            $table->string('isVerified')->default("0");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
