<?php

namespace Database\Seeders;

use App\Models\Nhom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nhom::factory(10)->create();
    }
}
