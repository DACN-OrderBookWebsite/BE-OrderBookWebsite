<?php

namespace Database\Seeders;

use App\Models\Quyen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quyen::factory(10)->create();
    }
}
