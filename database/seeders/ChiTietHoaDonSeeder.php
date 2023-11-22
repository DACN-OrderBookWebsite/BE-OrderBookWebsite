<?php

namespace Database\Seeders;

use App\Models\ChiTietHoaDon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChiTietHoaDonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChiTietHoaDon::factory(10)->create();
    }
}
