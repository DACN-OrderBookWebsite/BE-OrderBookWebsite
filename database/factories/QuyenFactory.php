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
        ])->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 2, 'name' => 'Người dùng']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 3, 'name' => 'Nhóm']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 4, 'name' => 'Nhóm người dùng']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 5, 'name' => 'Phân quyền']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 6, 'name' => 'Thể loại']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 7, 'name' => 'Nhà xuất bản']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 8, 'name' => 'Tác giả']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 9, 'name' => 'Sách']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 10, 'name' => 'Nhà cung cấp']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 11, 'name' => 'Nhập hàng']);
        })->afterCreating(function (Quyen $quyen) {
            Quyen::factory()->create(['id' => 12, 'name' => 'Xuất hàng']);
        });
    }
}
