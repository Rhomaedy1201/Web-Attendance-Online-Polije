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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->char('nim',9);
            $table->unsignedBigInteger('id_jadwal');
            $table->string('masuk',6);
            $table->string('selesai',6);
            $table->enum('status', ['telat','tepat']);
            $table->timestamps();

            $table->foreign('nim')
                ->references('nim')
                ->on('mahasiswa')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_jadwal')
                ->references('id')
                ->on('jadwal')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
