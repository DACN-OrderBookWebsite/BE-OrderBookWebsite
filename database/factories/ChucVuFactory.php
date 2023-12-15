<?php

namespace Database\Factories;

use App\Models\ChucVu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChucVu>
 */
class ChucVuFactory extends Factory
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
        ];
    }
    public function fixedData(): ChucVuFactory
    {
        return $this->state([
            'name' => 'admin',
        ])->afterCreating(function (ChucVu $ChucVu) {
            ChucVu::factory()->create(['name' => 'Khách hàng']);
        });
    }
}
