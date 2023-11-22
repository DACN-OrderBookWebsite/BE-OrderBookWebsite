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
        Schema::table('tbl_HoaDon', function (Blueprint $table) {
            $table->foreignId('idTrangThai')->nullable()->constrained('tbl_TrangThaiDonHang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_HoaDon', function (Blueprint $table) {
            $table->dropForeign(['idTrangThai']);
            $table->dropColumn('idTrangThai');
        });
    }
};
