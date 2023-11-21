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
        Schema::table('tbl_PhieuNhap', function (Blueprint $table) {
            $table->foreignId('idNhaCungCap')->nullable()->constrained('tbl_NhaCungCap');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_PhieuNhap', function (Blueprint $table) {
            $table->dropForeign(['idNhaCungCap']);
            $table->dropColumn('idNhaCungCap');
        });
    }
};
