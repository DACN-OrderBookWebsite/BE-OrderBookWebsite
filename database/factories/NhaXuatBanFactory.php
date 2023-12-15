<?php

namespace Database\Factories;

use App\Models\NhaXuatBan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NhaXuatBan>
 */
class NhaXuatBanFactory extends Factory
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
    public function fixedData(): NhaXuatBanFactory
    {
        return $this->state([
            'name' =>'Trường đại học Công Thương'
        ])->afterCreating(function (NhaXuatBan $NhaXuatBan) {
            NhaXuatBan::factory()->create(['name' => 'Trường đại học Khoa học tự nhiên']);
        })->afterCreating(function (NhaXuatBan $NhaXuatBan) {
            NhaXuatBan::factory()->create(['name' => 'Trường đại học Bách Khoa']);
        });
    }
}
