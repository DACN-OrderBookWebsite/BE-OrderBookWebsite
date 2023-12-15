<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(ChucVuSeeder::class);
        $this->call(NguoiDungSeeder::class);
        $this->call(NhomSeeder::class);
        $this->call(NhomNguoiDungSeeder::class);
        $this->call(QuyenSeeder::class);
        $this->call(PhanQuyenSeeder::class);
        $this->call(TheLoaiSeeder::class);
        $this->call(NhaXuatBanSeeder::class);
        $this->call(TacGiaSeeder::class);
        $this->call(SachSeeder::class);
        $this->call(TrangThaiDonHangSeeder::class);
        $this->call(NhaCungCapSeeder::class);
        // $this->call(PhieuNhapSeeder::class);
        // $this->call(ChiTietPhieuNhapSeeder::class);
        // $this->call(HoaDonSeeder::class);
        // $this->call(ChiTietHoaDonSeeder::class);
    }
}
