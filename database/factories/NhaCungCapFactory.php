<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NhaCungCap>
 */
class NhaCungCapFactory extends Factory
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
            'SDT' => $this->faker->unique()->phoneNumber,
            'DiaChi' => $this->faker->address,
            'Email' => $this->faker->unique()->safeEmail,
        ];
    }
}
