<?php

namespace Database\Factories;

use App\Models\NguoiDung;
use App\Models\Nhom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NhomNguoiDung>
 */
class NhomNguoiDungFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $NguoiDung = NguoiDung::inRandomOrder()->first();
        $Nhom = Nhom::inRandomOrder()->first();
        return [
            'idNguoiDung' => $NguoiDung->id,
            'idNhom' => $Nhom->id
        ];
    }
    public function fixedData(): NhomNguoiDungFactory
    {
        $NguoiDung = NguoiDung::inRandomOrder()->first();
        $Nhom = Nhom::inRandomOrder()->first();
        return $this->state([
            'idNguoiDung' => $NguoiDung->id,
            'idNhom' => $Nhom->id
        ]);
    }
}
