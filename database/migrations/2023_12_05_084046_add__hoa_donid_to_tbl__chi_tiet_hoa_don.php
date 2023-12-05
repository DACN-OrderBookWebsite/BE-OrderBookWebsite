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
        Schema::table('tbl_ChiTietHoaDon', function (Blueprint $table) {
            $table->foreignId('idHoaDon')->nullable()->constrained('tbl_HoaDon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_ChiTietHoaDon', function (Blueprint $table) {
            $table->dropForeign(['idHoaDon']);
            $table->dropColumn('idHoaDon');
        });
    }
};
