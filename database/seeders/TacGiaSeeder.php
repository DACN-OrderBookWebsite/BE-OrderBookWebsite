<?php

namespace Database\Seeders;

use App\Models\TacGia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TacGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TacGia::factory(10)->create();
    }
}
