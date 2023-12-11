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
        Schema::create('tbl_NguoiDung', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('TenDangNhap')->unique()->nullable();
            $table->string('MatKhau')->nullable();
            $table->string('SDT')->unique()->nullable();
            $table->string('DiaChi')->nullable();
            $table->string('Email')->unique()->nullable();
            $table->dateTime('NgayTao')->nullable();
            $table->dateTime('NgayThayDoi')->nullable();
            //$table->bigInteger('idChucVu')->nullable();
            $table->boolean('GioiTinh')->nullable();
            $table->string('Anh')->nullable();
            $table->boolean('Disabled')->nullable();
            //$table->string('remember_token')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_NguoiDung');
    }
};
