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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('Intern');
            $table->string('divisi_id');
            $table->string('no_hp');
            $table->string('jenis_kelamin');
            $table->string('nim');
            $table->string('jenjang_pendidikan');
            $table->string('jurusan');
            $table->string('universitas');
            $table->string('surat_kontrak');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->string('status')->default('Aktif');
            $table->string('sertifikat')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
