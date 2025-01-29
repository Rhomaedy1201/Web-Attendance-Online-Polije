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
        Schema::create('mst_prodi', function (Blueprint $table) {
            $table->id();
            $table->char('kode_prodi', 6)->unique();
            $table->char('kode_jurusan', 6);
            $table->String('nama', 120);
            $table->timestamps();
            
            $table->foreign('kode_jurusan')
                ->references('kode_jurusan')
                ->on('mst_jurusan')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_prodi');
    }
};

// Schema::create('mahasiswa_detail', function (Blueprint $table) {
//     $table->id();
//     $table->foreign('kode_prodi')
//         ->references('kode_prodi')
//         ->on('mst_prodi')
//         ->onUpdate('cascade');
//     $table->enum('jk', ['L','P']);
//     $table->string('alamat');
//     $table->char('telp', 12);
//     $table->char('telp', 12);
//     $table->timestamps();
// });