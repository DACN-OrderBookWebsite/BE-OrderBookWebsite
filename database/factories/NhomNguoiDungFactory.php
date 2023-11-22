<?php

namespace Database\Factories;

use App\Models\NguoiDung;
use App\Models\Nhom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NhomNguoiDung>
 */
class NhomNguoiDungFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idNguoiDung' => NguoiDung::factory(),
            'idNhom' => Nhom::factory()
        ];
    }
}