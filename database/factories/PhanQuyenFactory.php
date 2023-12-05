<?php

namespace Database\Factories;

use App\Models\Nhom;
use App\Models\Quyen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhanQuyen>
 */
class PhanQuyenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Nhom = Nhom::inRandomOrder()->first();
        $Quyen = Quyen::inRandomOrder()->first();
        return [
            'idNhom' => $Nhom->id,
            'idQuyen' => $Quyen->id,
        ];
    }
}
