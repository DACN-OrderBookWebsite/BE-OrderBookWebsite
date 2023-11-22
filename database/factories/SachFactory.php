<?php

namespace Database\Factories;

use App\Models\NhaXuatBan;
use App\Models\TacGia;
use App\Models\TheLoai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sach>
 */
class SachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'idTheLoai' => TheLoai::factory(),
            'idNhaXuatBan' => NhaXuatBan::factory(),
            'idTacGia' => TacGia::factory(),
            'DonGia' => $this->faker->randomFloat(2, 0, 10000000),
            'SoLuongTon' => $this->faker->randomNumber(),
            'Anh' => $this->faker->imageUrl(),
            'Disabled' => $this->faker->boolean(90)
        ];
    }
}
