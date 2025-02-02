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
        Schema::table('mahasiswa_detail', function (Blueprint $table) {
            DB::statement('ALTER TABLE mahasiswa_detail MODIFY id BIGINT NOT NULL');
        });

        Schema::table('mahasiswa_detail', function (Blueprint $table) {
            $table->dropPrimary();
            $table->dropColumn('id');
            $table->char('nim', 9)->primary()->first();
        });

        Schema::table('mahasiswa_detail', function (Blueprint $table) {
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
        Schema::table('mahasiswa_detail', function (Blueprint $table) {
            // Hapus Foreign Key NIM
            $table->dropForeign(['nim']);

            // Hapus Primary Key NIM
            $table->dropPrimary();

            // Hapus Kolom NIM
            $table->dropColumn('nim');

            // Tambahkan Kembali ID Sebagai Primary Key dengan Auto Increment
            $table->bigIncrements('id');
        });
    }
};
