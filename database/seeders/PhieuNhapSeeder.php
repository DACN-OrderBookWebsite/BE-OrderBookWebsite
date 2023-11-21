<?php

namespace Database\Seeders;

use App\Models\PhieuNhap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhieuNhapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhieuNhap::factory(10)->create();
    }
}
