<?php

namespace Database\Factories;

use App\Models\NhaCungCap;
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
    public function fixedData(): NhaCungCapFactory
    {
        return $this->state([
            'name' =>'Trường đại học công thương ',
            'SDT' => '02838163318',
            'DiaChi' => '140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân Phú, TP.HCM',
            'Email' => 'infor@hufi.edu.vn',
        ]);
    }
}
