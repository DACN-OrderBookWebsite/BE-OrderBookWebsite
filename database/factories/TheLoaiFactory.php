<?php

namespace Database\Factories;

use App\Models\TheLoai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TheLoai>
 */
class TheLoaiFactory extends Factory
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
    public function fixedData(): TheLoaiFactory
    {
        return $this->state([
            'name' =>'Khoa công nghệ thông tin'
        ])->afterCreating(function (TheLoai $TheLoai) {
            TheLoai::factory()->create(['name' => 'Khoa giáo dục thể chất và quốc phòng']);
        })->afterCreating(function (TheLoai $TheLoai) {
            TheLoai::factory()->create(['name' => 'Khoa ngoại ngữ']);
        })->afterCreating(function (TheLoai $TheLoai) {
            TheLoai::factory()->create(['name' => 'Khoa chính trị - luật']);
        })->afterCreating(function (TheLoai $TheLoai) {
            TheLoai::factory()->create(['name' => 'Khoa toán học']);
        });
    }
}
