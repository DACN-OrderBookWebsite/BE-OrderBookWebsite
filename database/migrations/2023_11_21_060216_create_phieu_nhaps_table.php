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
        Schema::create('tbl_PhieuNhap', function (Blueprint $table) {
            $table->id();
            $table->dateTime('NgayNhap')->nullable();
            $table->dateTime('NgayNhanHang')->nullable();
            $table->integer('TongSoLuong')->nullable();
            $table->double('TongTien')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_PhieuNhap');
    }
};
