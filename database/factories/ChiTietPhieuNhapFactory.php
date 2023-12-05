<?php

namespace Database\Factories;

use App\Models\PhieuNhap;
use App\Models\Sach;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChiTietPhieuNhap>
 */
class ChiTietPhieuNhapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Sach = Sach::inRandomOrder()->first();
        $PhieuNhap = PhieuNhap::inRandomOrder()->first();
        return [
            'idSanPham' => $Sach->id,
            'idPhieuNhap' => $PhieuNhap->id,
            'SoLuong' => $this->faker->randomNumber(2),
            'DonGiaNhap' => $this->faker->randomFloat(2,0,1000000000)
        ];
    }
}
