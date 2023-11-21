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
            $table->foreignId('idQuyen')->nullable()->constrained('tbl_Quyen');
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
