<?php

namespace Database\Seeders;

use App\Models\NhomNguoiDung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhomNguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NhomNguoiDung::factory()->fixedData()->create();
    }
}
