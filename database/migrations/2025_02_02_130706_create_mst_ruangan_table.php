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
        Schema::create('mst_ruangan', function (Blueprint $table) {
            $table->id();
            $table->char('kode_jurusan', 6);
            $table->string('nama_gedung',100);
            $table->string('nama_kelas',100)->comment('nama kelas contoh. 13.4');
            $table->timestamps();

            $table->foreign('kode_jurusan')
                ->references('kode_jurusan')
                ->on('mst_jurusan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_ruangan');
    }
};
