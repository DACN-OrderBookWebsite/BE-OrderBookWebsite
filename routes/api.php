<?php

use App\Http\Controllers\ChiTietHoaDonController;
use App\Http\Controllers\ChiTietPhieuNhapController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\NhaXuatBanController;
use App\Http\Controllers\NhomController;
use App\Http\Controllers\NhomNguoiDungController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\PhieuNhapController;
use App\Http\Controllers\QuyenController;
use App\Http\Controllers\SachController;
use App\Http\Controllers\TacGiaController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\TrangThaiDonHangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('TheLoai/getFiveTheLoai', [TheLoaiController::class, 'getFiveTheLoai']);

Route::apiResource('ChucVu', ChucVuController::class);

Route::get('NguoiDung/create', [NguoiDungController::class, 'create']);

Route::get('NguoiDung/{id}/edit', [NguoiDungController::class, 'edit']);

Route::apiResource('NguoiDung', NguoiDungController::class);

Route::apiResource('Nhom', NhomController::class);

Route::get('NhomNguoiDung/create', [NhomNguoiDungController::class, 'create']);

Route::get('NhomNguoiDung/{id}/edit', [NhomNguoiDungController::class, 'edit']);

Route::apiResource('NhomNguoiDung', NhomNguoiDungController::class);

Route::apiResource('Quyen', QuyenController::class);

Route::get('PhanQuyen/create', [PhanQuyenController::class, 'create']);

Route::get('PhanQuyen/{id}/edit', [PhanQuyenController::class, 'edit']);

Route::apiResource('PhanQuyen', PhanQuyenController::class);

Route::apiResource('TheLoai', TheLoaiController::class);

Route::apiResource('NhaXuatBan', NhaXuatBanController::class);

Route::apiResource('TacGia', TacGiaController::class);

Route::get('Sach/create', [SachController::class, 'create']);

Route::get('Sach/{id}/edit', [SachController::class, 'edit']);

Route::apiResource('Sach', SachController::class);

Route::apiResource('TrangThaiDonHang', TrangThaiDonHangController::class);

Route::apiResource('NhaCungCap', NhaCungCapController::class);

Route::get('PhieuNhap/create', [PhieuNhapController::class, 'create']);

Route::get('PhieuNhap/{id}/edit', [PhieuNhapController::class, 'edit']);

Route::apiResource('PhieuNhap', PhieuNhapController::class);

Route::get('ChiTietPhieuNhap/create', [ChiTietPhieuNhapController::class, 'create']);

Route::get('ChiTietPhieuNhap/{id}/edit', [ChiTietPhieuNhapController::class, 'edit']);

Route::apiResource('ChiTietPhieuNhap', ChiTietPhieuNhapController::class);

Route::get('HoaDon/create', [HoaDonController::class, 'create']);

Route::get('HoaDon/{id}/edit', [HoaDonController::class, 'edit']);

Route::apiResource('HoaDon', HoaDonController::class);

Route::get('ChiTietHoaDon/create', [ChiTietHoaDonController::class, 'create']);

Route::get('ChiTietHoaDon/{id}/edit', [ChiTietHoaDonController::class, 'edit']);

Route::apiResource('ChiTietHoaDon', ChiTietHoaDonController::class);

Route::post('/upload-avatar', [ImageUploadController::class, 'uploadAvatar']);

Route::put('/NguoiDung/{id}/changePassword', [NguoiDungController::class, 'changePassword']);

Route::get('NguoiDung/{username}/{password}/checkLogin', [NguoiDungController::class, 'checkLogin']);

Route::get('Quyen/{idNhom}/getDataIsNotAddByGroup', [QuyenController::class, 'getDataIsNotAddByGroup']);

Route::get('PhanQuyen/{idNhom}/getDataByidNhom', [PhanQuyenController::class, 'getDataByidNhom']);

Route::get('NguoiDung/{idNhom}/getDataIsNotAddByGroup', [NguoiDungController::class, 'getDataIsNotAddByGroup']);

Route::get('NhomNguoiDung/{idNhom}/getDataByidNhom', [NhomNguoiDungController::class, 'getDataByidNhom']);

Route::get('PhanQuyen/{idNguoiDung}/{idQuyen}/checkQuyen', [PhanQuyenController::class, 'checkQuyen']);

Route::get('PhieuNhap/{idTrangThai}/getDataByidTrangThai', [PhieuNhapController::class, 'getDataByidTrangThai']);

Route::get('ChiTietPhieuNhap/{idPhieuNhap}/getDataByidPhieuNhapAndNameOfSanPham', [ChiTietPhieuNhapController::class, 'getDataByidPhieuNhapAndNameOfSanPham']);

Route::get('ChiTietPhieuNhap/{idPhieuNhap}/{idSanPham}/getDataByCheckSanPhamIsInsertedToPhieuNhap', [ChiTietPhieuNhapController::class, 'getDataByCheckSanPhamIsInsertedToPhieuNhap']);

Route::get('ChiTietPhieuNhap/{idPhieuNhap}/calculateTongTienOfPhieuNhap', [ChiTietPhieuNhapController::class, 'calculateTongTienOfPhieuNhap']);

Route::get('ChiTietPhieuNhap/{idPhieuNhap}/sumSoLuongOfPhieuNhap', [ChiTietPhieuNhapController::class, 'sumSoLuongOfPhieuNhap']);

Route::delete('ChiTietPhieuNhap/{idPhieuNhap}/deleteByPhieuNhap', [ChiTietPhieuNhapController::class, 'deleteByPhieuNhap']);

Route::get('ChiTietPhieuNhap/{idPhieuNhap}/getDataByPhieuNhap', [ChiTietPhieuNhapController::class, 'getDataByPhieuNhap']);

Route::put('Sach/{id}/updateSoLuongSanPhamByPhieuNhap', [SachController::class, 'updateSoLuongSanPhamByPhieuNhap']);