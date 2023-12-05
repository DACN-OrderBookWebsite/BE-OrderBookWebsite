<?php

namespace Database\Factories;

use App\Models\TrangThaiDonHang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrangThaiDonHang>
 */
class TrangThaiDonHangFactory extends Factory
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

    public function fixedData(): TrangThaiDonHangFactory
    {
        return $this->state([
            'id' => 1,
            'name' => 'Chưa xác nhận',
        ])->afterCreating(function (TrangThaiDonHang $TrangThaiDonHang) {
            TrangThaiDonHang::factory()->create(['id' => 2, 'name' => 'Đã xác nhận']);
        })->afterCreating(function (TrangThaiDonHang $TrangThaiDonHang) {
            TrangThaiDonHang::factory()->create(['id' => 3, 'name' => 'Chưa thanh toán']);
        })->afterCreating(function (TrangThaiDonHang $TrangThaiDonHang) {
            TrangThaiDonHang::factory()->create(['id' => 4, 'name' => 'Hoàn thành']);
        });
    }
}
