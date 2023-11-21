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
        Schema::create('tbl_Sach', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->double('DonGia')->nullable();
            $table->integer('SoLuongTon')->nullable();
            $table->string('Anh')->nullable();
            $table->boolean('Disabled')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_Sach');
    }
};
