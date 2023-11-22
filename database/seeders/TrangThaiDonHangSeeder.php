<?php

namespace Database\Seeders;

use App\Models\TrangThaiDonHang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrangThaiDonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrangThaiDonHang::factory(10)->create();
    }
}
