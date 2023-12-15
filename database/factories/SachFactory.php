<?php

namespace Database\Factories;

use App\Models\NhaXuatBan;
use App\Models\TacGia;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sach>
 */
class SachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $TheLoai = TheLoai::inRandomOrder()->first();
        $NhaXuatBan = NhaXuatBan::inRandomOrder()->first();
        $TacGia = TacGia::inRandomOrder()->first();
        return [
            'name' => $this->faker->name(),
            'idTheLoai' => $TheLoai->id,
            'idNhaXuatBan' => $NhaXuatBan->id,
            'idTacGia' => $TacGia->id,
            'DonGia' => $this->faker->randomFloat(2, 0, 10000000),
            'SoLuongTon' => $this->faker->randomNumber(),
            'Anh' => $this->faker->imageUrl(),
            'Disabled' => $this->faker->boolean(90),
            'NamXuatBan' => $this->faker->randomNumber(4),
        ];
    }
    public function fixedData(): SachFactory
    {
        return $this->state([
            'name' =>'Giáo dục quốc phòng - an ninh 1',
            'idTheLoai' => 2,
            'idNhaXuatBan' => 1,
            'idTacGia' => 2,
            'DonGia' => 30000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Giao-trinh-Giao-duc-Quoc-phong-va-An-ninh-Tap-1.png',
            'Disabled' => false,
            'NamXuatBan' => 2017,
        ])->afterCreating(function (Sach $Sach) {
            Sach::factory()->create(['name' =>'Nhập môn lập trình',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 50000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Nhap-mon-lap-trinh.png',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create(['name' =>'Kỹ năng ứng dụng công nghệ thông tin',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 50000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Ky-nang-ung-dung-cong-nghe-thong-tin.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create(['name' =>'Anh văn 1',
            'idTheLoai' => 3,
            'idNhaXuatBan' => 1,
            'idTacGia' => 3,
            'DonGia' => 200000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Anh-van-1.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create(['name' =>'Nguyên lý ngôn ngữ lập trình',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 40000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Nguyen-ly-ngon-ngu-lap-trinh.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create(['name' =>'Kiến trúc máy tính',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 40000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Kien-truc-may-tinh.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create(['name' =>'Kỹ thuật lập trình',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 40000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Ky-thuat-lap-trinh.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create(['name' =>'Triết hoc Mác- lênin',
            'idTheLoai' => 4,
            'idNhaXuatBan' => 1,
            'idTacGia' => 4,
            'DonGia' => 20000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Triet-hoc-mac-le-nin.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create(['name' =>'Anh văn 2',
            'idTheLoai' => 3,
            'idNhaXuatBan' => 1,
            'idTacGia' => 3,
            'DonGia' => 200000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Anh-van-1.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create(['name' =>'Giải tích',
            'idTheLoai' => 5,
            'idNhaXuatBan' => 1,
            'idTacGia' => 5,
            'DonGia' => 25000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Giai-tich.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create(['name' =>'Đại số tuyến tính',
            'idTheLoai' => 5,
            'idNhaXuatBan' => 1,
            'idTacGia' => 5,
            'DonGia' => 25000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Dai-so-tuyen-tinh.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' =>'Hệ điều hành',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 25000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/He-dieu-hanh.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' =>'Mạng máy tính',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 30000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Mang-may-tinh.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' =>'Cấu trúc dữ liệu và giải thuật',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 30000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Cau-truc-du-lieu-va-giai-thuât.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' =>'Cấu trúc rời rạc',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 30000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Toan-roi-rac.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' =>'Đồ họa ứng dụng',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 30000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Do-hoa-ung-dung.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Phân tích thiết kế thuật toán',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 30000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Phan-tich-thiet-ke-va-giai-thuat.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Chủ nghĩa xã hội khoa học',
            'idTheLoai' => 4,
            'idNhaXuatBan' => 1,
            'idTacGia' => 4,
            'DonGia' => 30000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Chu-nghia-xa-hoi-khoa-hoc.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Cơ sở dữ liệu',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 30000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Co-so-du-lieu.png',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Giáo dục quốc phòng - an ninh 2',
            'idTheLoai' => 2,
            'idNhaXuatBan' => 1,
            'idTacGia' => 2,
            'DonGia' => 30000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Giao-trinh-giao-duc-quoc-phong-an-ninh-tap-2.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Lập trình hướng đối tượng',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 30000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Lap-trinh-huong-doi-tuong.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Thiết kế web',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 40000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Thiet-ke-web.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Anh văn 3',
            'idTheLoai' => 3,
            'idNhaXuatBan' => 1,
            'idTacGia' => 3,
            'DonGia' => 200000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Anh-van-1.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Hệ quản trị cơ sở dữ liệu',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 55000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/He-quan-tri-co-so-du-lieu.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Kinh tế chính trị Mác – Lênin',
            'idTheLoai' => 4,
            'idNhaXuatBan' => 1,
            'idTacGia' => 4,
            'DonGia' => 20000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Kinh-te-chinh-tri-mac-le-nin.clsbi',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Lập trình Web',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 55000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Lap-trinh-web.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Trí tuệ nhân tạo',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 55000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Tri-tue-nhan-tao.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Công nghệ .NET',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 55000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Cong-nghe-net.png',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Nhập môn Công nghệ phần mềm',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 55000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Nhap-mon-cong-nghe-phan-mem.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Công Nghệ Java',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 55000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Cong-nghe-java.png',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Lịch sử Đảng Cộng sản Việt Nam',
            'idTheLoai' => 4,
            'idNhaXuatBan' => 1,
            'idTacGia' => 4,
            'DonGia' => 20000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Lich-su-dang-cong-san-viet-nam.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Giáo dục quốc phòng - an ninh 3',
            'idTheLoai' => 2,
            'idNhaXuatBan' => 1,
            'idTacGia' => 2,
            'DonGia' => 20000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Giao-duc-quoc-phong-an-ninh-3.webp',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Giáo dục quốc phòng - an ninh 4',
            'idTheLoai' => 2,
            'idNhaXuatBan' => 1,
            'idTacGia' => 2,
            'DonGia' => 20000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Giao-trinh-Giao-duc-Quoc-phong-va-An-ninh-4.png',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Phân tích thiết kế hệ thống thông tin',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 55000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Phan-tich-thiet-ke-he-thong-thong-tin.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Hệ quản trị cơ sở dữ liệu Oracle',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 55000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/He-quan-tri-co-so-du-lieu-oracle.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Lập trình mã nguồn mở',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 55000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Lap-trinh-ma-nguon-mo.png',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Quản trị mạng',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 40000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Quan-tri-mang.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Xử lý ảnh',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 30000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Xu-ly-anh.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Truyền thông kỹ thuật số',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 30000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Truyen-thong-ky-thuat-so.png',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Phát triển ứng dụng di động',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 50000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Phat-trien-ung-dung-di-dong.png',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Ngôn ngữ lập trình hiện đại',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 50000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Ngon-ngu-lap-trinh-hien-dai.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Tư tưởng Hồ Chí Minh',
            'idTheLoai' => 4,
            'idNhaXuatBan' => 1,
            'idTacGia' => 4,
            'DonGia' => 20000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Tu-tuong-ho-chi-minh.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        })->afterCreating(function (Sach $Sach) {
            Sach::factory()->create([
            'name' => 'Công nghệ phần mềm nâng cao',
            'idTheLoai' => 1,
            'idNhaXuatBan' => 1,
            'idTacGia' => 1,
            'DonGia' => 50000,
            'SoLuongTon' => 0,
            'Anh' => 'http://localhost:8000/images/Sach/Cong-nghe-phan-mem-nang-cao.jpg',
            'Disabled' => false,
            'NamXuatBan' => 2017,
            ]);
        });
    }
}