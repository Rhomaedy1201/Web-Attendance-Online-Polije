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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->enum('hari', ['senin','selasa','rabu','kamis','jumat','sabtu']);
            $table->string('jam_masuk', 6);
            $table->string('jam_toleransi_masuk', 6);
            $table->string('jam_selesai', 6);
            $table->string('jam_toleransi_selesai', 6)->nullable(true);
            $table->string('durasi', 10);
            $table->unsignedBigInteger('id_mk');
            $table->string('semester', 3);
            $table->unsignedBigInteger('id_ruang');
            $table->char('golongan',1);
            $table->char('kode_prodi',6);
            $table->timestamps();

            $table->foreign('id_mk')
                ->references('id')
                ->on('mata_kuliah')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_ruang')
                ->references('id')
                ->on('mst_ruangan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('golongan')
                ->references('golongan')
                ->on('mst_golongan')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('kode_prodi')
                ->references('kode_prodi')
                ->on('mst_prodi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
