<?php

namespace Database\Factories;

use App\Models\TacGia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TacGia>
 */
class TacGiaFactory extends Factory
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
    public function fixedData(): TacGiaFactory
    {
        return $this->state([
            'name' =>'Nguyễn Văn A'
        ])->afterCreating(function (TacGia $TacGia) {
            TacGia::factory()->create(['name' => 'Trần Văn B']);
        })->afterCreating(function (TacGia $TacGia) {
            TacGia::factory()->create(['name' => 'Nguyễn Thị C']);
        })->afterCreating(function (TacGia $TacGia) {
            TacGia::factory()->create(['name' => 'Ngộ Đinh D']);
        })->afterCreating(function (TacGia $TacGia) {
            TacGia::factory()->create(['name' => 'Trần Đình E']);
        });
    }
}
