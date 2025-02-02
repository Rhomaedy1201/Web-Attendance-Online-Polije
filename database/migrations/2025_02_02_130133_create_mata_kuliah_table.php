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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->char('kode_prodi', 6);
            $table->string('nama',150);
            $table->string('sks',3);
            $table->unsignedBigInteger('id_dosen');
            $table->timestamps();

            $table->foreign('kode_prodi')
                ->references('kode_prodi')
                ->on('mst_prodi')
                ->onUpdate('cascade');

            $table->foreign('id_dosen')
                ->references('id')
                ->on('mst_dosen')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
