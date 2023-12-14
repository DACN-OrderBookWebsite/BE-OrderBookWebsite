<?php

namespace Database\Factories;

use App\Models\Nhom;
use App\Models\PhanQuyen;
use App\Models\Quyen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhanQuyen>
 */
class PhanQuyenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Nhom = Nhom::inRandomOrder()->first();
        $Quyen = Quyen::inRandomOrder()->first();
        return [
            'idNhom' => $Nhom->id,
            'idQuyen' => $Quyen->id,
        ];
    }
    public function fixedData(): PhanQuyenFactory
    {
        return $this->state([
            'idNhom' => 1,
            'idQuyen' => 1
        ])->afterCreating(function (PhanQuyen $quyen) {
            PhanQuyen::factory()->create(['idNhom' =>  1, 'idQuyen' => 2]);
        })->afterCreating(function (PhanQuyen $quyen) {
            PhanQuyen::factory()->create(['idNhom' => 1, 'idQuyen' => 3]);
        })->afterCreating(function (PhanQuyen $quyen) {
            PhanQuyen::factory()->create(['idNhom' => 1, 'idQuyen' => 4]);
        })->afterCreating(function (PhanQuyen $quyen) {
            PhanQuyen::factory()->create(['idNhom' => 1, 'idQuyen' => 5]);
        })->afterCreating(function (PhanQuyen $quyen) {
            PhanQuyen::factory()->create(['idNhom' => 1, 'idQuyen' => 6]);
        })->afterCreating(function (PhanQuyen $quyen) {
            PhanQuyen::factory()->create(['idNhom' => 1, 'idQuyen' => 7]);
        })->afterCreating(function (PhanQuyen $quyen) {
            PhanQuyen::factory()->create(['idNhom' => 1, 'idQuyen' => 8]);
        })->afterCreating(function (PhanQuyen $quyen) {
            PhanQuyen::factory()->create(['idNhom' => 1, 'idQuyen' => 9]);
        })->afterCreating(function (PhanQuyen $quyen) {
            PhanQuyen::factory()->create(['idNhom' => 1, 'idQuyen' => 10]);
        })->afterCreating(function (PhanQuyen $quyen) {
            PhanQuyen::factory()->create(['idNhom' => 1, 'idQuyen' => 11]);
        })->afterCreating(function (PhanQuyen $quyen) {
            PhanQuyen::factory()->create(['idNhom' => 1, 'idQuyen' => 12]);
        });
    }
}
