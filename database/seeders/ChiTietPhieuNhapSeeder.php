<?php

namespace Database\Seeders;

use App\Models\ChiTietPhieuNhap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChiTietPhieuNhapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChiTietPhieuNhap::factory(10)->create();
    }
}
