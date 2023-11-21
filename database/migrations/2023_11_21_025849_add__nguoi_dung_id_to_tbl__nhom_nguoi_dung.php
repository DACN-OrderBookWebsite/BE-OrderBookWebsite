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
        Schema::table('tbl_NhomNguoiDung', function (Blueprint $table) {
            $table->foreignId('idNguoiDung')->nullable()->constrained('tbl_NguoiDung');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_NhomNguoiDung', function (Blueprint $table) {
            $table->dropForeign(['idNguoiDung']);
            $table->dropColumn('idNguoiDung');
        });
    }
};
