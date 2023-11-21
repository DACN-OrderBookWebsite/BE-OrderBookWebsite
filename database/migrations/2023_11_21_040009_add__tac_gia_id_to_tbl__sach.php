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
        Schema::table('tbl_Sach', function (Blueprint $table) {
            $table->foreignId('idTacGia')->nullable()->constrained('tbl_TacGia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_Sach', function (Blueprint $table) {
            $table->dropForeign(['idTacGia']);
            $table->dropColumn('idTacGia');
        });
    }
};
