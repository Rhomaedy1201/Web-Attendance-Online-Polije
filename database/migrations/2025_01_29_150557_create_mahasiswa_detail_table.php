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
        Schema::create('mahasiswa_detail', function (Blueprint $table) {
            $table->char('nim', 9);
            $table->char('kode_prodi', 6);
            $table->enum('jk', ['L', 'P']);
            $table->string('alamat');
            $table->char('telp', 12);
            $table->char('golongan', 1);
            $table->char('angkatan', 4);
            $table->char('semester_sekarang', 2);
            $table->string('semester_tempuh');
            $table->timestamps();

            $table->foreign('kode_prodi')
                ->references('kode_prodi')
                ->on('mst_prodi')
                ->onUpdate('cascade');

            $table->foreign('golongan')
                ->references('golongan')
                ->on('mst_golongan')
                ->onUpdate('cascade');

            $table->foreign('nim')
                ->references('nim')
                ->on('mahasiswa')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_detail');
    }
};
