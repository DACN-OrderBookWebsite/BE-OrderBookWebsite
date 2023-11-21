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
        Schema::table('tbl_PhanQuyen', function (Blueprint $table) {
            $table->foreignId('idQuyen')->constrained('tbl_Nhom');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_PhanQuyen', function (Blueprint $table) {
            $table->dropForeign(['idQuyen']);
            $table->dropColumn('idQuyen');
        });
    }
};
