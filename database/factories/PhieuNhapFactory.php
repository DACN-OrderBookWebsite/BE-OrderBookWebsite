<?php

namespace Database\Factories;

use App\Models\NguoiDung;
use App\Models\NhaCungCap;
use App\Models\TrangThaiDonHang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhieuNhap>
 */
class PhieuNhapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $TrangThaiDonHang = TrangThaiDonHang::inRandomOrder()->first();
        $NguoiDung = NguoiDung::inRandomOrder()->first();
        $NhaCungCap = NhaCungCap::inRandomOrder()->first();
        return [
            'NgayNhap' => $this->faker->dateTime(),
            'NgayNhanHang' => $this->faker->dateTime(),
            'TongSoLuong' => $this->faker->randomNumber(),
            'TongTien' => $this->faker->randomFloat(2,0,100000000),
            'idTrangThai' => $TrangThaiDonHang->id,
            'idNhanVien' => $NguoiDung->id,
            'idNhaCungCap' => $NhaCungCap->id
        ];
    }
}
