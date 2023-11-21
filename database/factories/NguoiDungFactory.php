<?php

namespace Database\Factories;

use App\Models\ChucVu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NguoiDung>
 */
class NguoiDungFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'TenDangNhap' => $this->faker->unique()->userName,
            'MatKhau' => bcrypt('password'), // bạn có thể sử dụng bcrypt để tạo mật khẩu được băm
            'SDT' => $this->faker->unique()->phoneNumber,
            'DiaChi' => $this->faker->address,
            'Email' => $this->faker->unique()->safeEmail,
            'NgayTao' => now(),
            'NgayThayDoi' => now(),
            'idChucVu' => ChucVu::factory(),
            'GioiTinh' => $this->faker->boolean,
            'Anh' => $this->faker->imageUrl(),
            'Disabled' => $this->faker->boolean,
        ];
    }
}
