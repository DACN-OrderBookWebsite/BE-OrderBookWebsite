<?php

namespace Database\Factories;

use App\Models\NguoiDung;
use App\Models\TrangThaiDonHang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HoaDon>
 */
class HoaDonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NgayXuat' => $this->faker->dateTime(),
            //'NgayNhanHang' => $this->faker->dateTime(),
            'TongSoLuong' => $this->faker->randomNumber(),
            'TongTien' => $this->faker->randomFloat(2,0,100000000),
            'isGroup' => $this->faker->boolean(),
            'idTrangThai' => TrangThaiDonHang::factory(),
            'idNhanVien' => NguoiDung::factory(),
            'idKhachHang' => NguoiDung::factory()
        ];
    }
}
