<?php

namespace Database\Factories;

use App\Models\Quyen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quyen>
 */
class QuyenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name()
        ];
    }

    public function fixedData(): QuyenFactory
    {
        return $this->state([
            'id' => 1,
            'name' => 'Chức vụ',
            'direction' => 'ChucVu'
        ])->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 2, 'name' => 'Người dùng', 'direction' => 'NguoiDung']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 3, 'name' => 'Nhóm', 'direction' => 'Nhom']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 4, 'name' => 'Nhóm người dùng', 'direction' => 'NhomNguoiDung']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 5, 'name' => 'Phân quyền', 'direction' => 'PhanQuyen']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 6, 'name' => 'Thể loại', 'direction' => 'TheLoai']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 7, 'name' => 'Nhà xuất bản', 'direction' => 'NhaXuatBan']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 8, 'name' => 'Tác giả', 'direction' => 'TacGia']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 9, 'name' => 'Sách', 'direction' => 'Sach']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 10, 'name' => 'Nhà cung cấp', 'direction' => 'NhaCungCap']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 11, 'name' => 'Nhập hàng', 'direction' => 'NhapHang']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 12, 'name' => 'Xuất hàng', 'direction' => 'XuatHang']);
        });
    }
}
