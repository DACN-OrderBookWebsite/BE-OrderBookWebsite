<?php

namespace Database\Factories;

use App\Models\HoaDon;
use App\Models\Sach;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChiTietHoaDon>
 */
class ChiTietHoaDonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Sach = Sach::inRandomOrder()->first();
        $HoaDon = HoaDon::inRandomOrder()->first();
        return [
            'idSanPham' => $Sach->id,
            'idHoaDon' => $HoaDon->id,
            'SoLuong' => $this->faker->randomNumber(2),
            'DonGia' => $this->faker->randomFloat(2,0,1000000000)
        ];
    }
}
