<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('magangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('divisi');
            $table->string('email');
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
            $table->timestamps();
        });

        DB::unprepared('
            CREATE TRIGGER update_divisi AFTER INSERT ON magangs
            FOR EACH ROW
            BEGIN
                UPDATE divisis SET jumlah_anggota = jumlah_anggota + 1 WHERE divisis.nama = NEW.divisi;
                UPDATE divisis SET updated_at = NOW() WHERE divisis.nama = NEW.divisi;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER update_divisi_after_delete AFTER DELETE ON magangs
            FOR EACH ROW
            BEGIN
                UPDATE divisis SET jumlah_anggota = jumlah_anggota - 1 WHERE divisis.nama = OLD.divisi;
                UPDATE divisis SET updated_at = NOW() WHERE divisis.nama = OLD.divisi;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magangs');
        DB::unprepared('DROP TRIGGER IF EXISTS update_divisi');
        DB::unprepared('DROP TRIGGER IF EXISTS update_divisi_after_delete');
    }
};
