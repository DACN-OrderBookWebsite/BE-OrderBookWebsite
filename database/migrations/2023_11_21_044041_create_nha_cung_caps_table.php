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
        Schema::create('tbl_NhaCungCap', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('SDT')->unique()->nullable();
            $table->string('DiaChi')->nullable();
            $table->string('Email')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_NhaCungCap');
    }
};
