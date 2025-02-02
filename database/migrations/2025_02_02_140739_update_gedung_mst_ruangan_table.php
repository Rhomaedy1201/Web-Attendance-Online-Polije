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
        Schema::table('mst_ruangan', function (Blueprint $table) {
            $table->dropColumn('nama_gedung');
            $table->char('kode_jurusan', 6)->unique()->after('id');

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
        Schema::table('mst_ruangan', function (Blueprint $table) {
            $table->dropForeign(['kode_jurusan']);
            $table->dropPrimary();
            $table->dropColumn('kode_jurusan');
            $table->string('nama_gedung', 100);
        });
    }
};
