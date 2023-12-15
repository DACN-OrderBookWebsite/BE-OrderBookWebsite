<?php

namespace Database\Factories;

use App\Models\ChucVu;
use App\Models\NguoiDung;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $ChucVu = ChucVu::inRandomOrder()->first();
        return [
            'name' => $this->faker->name,
            'TenDangNhap' => $this->faker->unique()->userName,
            'MatKhau' => bcrypt('password'), // bạn có thể sử dụng bcrypt để tạo mật khẩu được băm
            'SDT' => $this->faker->unique()->phoneNumber,
            'DiaChi' => $this->faker->address,
            'Email' => $this->faker->unique()->safeEmail,
            'NgayTao' => now(),
            'NgayThayDoi' => now(),
            'idChucVu' => $ChucVu->id,
            'GioiTinh' => $this->faker->boolean,
            'Anh' => $this->faker->imageUrl(),
            'Disabled' => $this->faker->boolean,
            'remember_token' => Str::random(60),
        ];
    }
    public function fixedData(): NguoiDungFactory{
        //$ChucVu = ChucVu::inRandomOrder()->first();
        return $this->state([
            'name' => 'admin',
            'TenDangNhap' => 'administrator',
            'MatKhau' => bcrypt('123'),
            'SDT' => '0123456789',
            'DiaChi' => '140 Lê Trọng Tấn',
            'Email' => 'administrator@gmail.com',
            'NgayTao' => now(),
            'NgayThayDoi' => now(),
            'idChucVu' => 1,
            'GioiTinh' => $this->faker->boolean,
            'Anh' => 'http://localhost:8000/images/NguoiDung/User.png',
            'Disabled' => false,
            'remember_token' => Str::random(60),
        ])->afterCreating(function (NguoiDung $Sach) {
            NguoiDung::factory()->create([
                'name' => 'Khách vãng lai',
                'TenDangNhap' => 'khachvanglai',
                'MatKhau' => bcrypt('123'),
                'SDT' => '0111111111',
                'DiaChi' => '140 Lê Trọng Tấn',
                'Email' => 'khachvanglai@gmail.com',
                'NgayTao' => now(),
                'NgayThayDoi' => now(),
                'idChucVu' => 2,
                'GioiTinh' => $this->faker->boolean,
                'Anh' => 'http://localhost:8000/images/NguoiDung/User.png',
                'Disabled' => false,
                'remember_token' => Str::random(60),
            ]);
        });
    }
}
