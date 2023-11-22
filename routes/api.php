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
use App\Models\TrangThaiDonHang;
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

Route::apiResource('ChucVu', ChucVuController::class);

Route::apiResource('NguoiDung', NguoiDungController::class);

Route::apiResource('Nhom', NhomController::class);

Route::apiResource('NhomNguoiDung', NhomNguoiDungController::class);

Route::apiResource('Quyen', QuyenController::class);

Route::apiResource('PhanQuyen', PhanQuyenController::class);

Route::apiResource('TheLoai', TheLoaiController::class);

Route::apiResource('NhaXuatBan', NhaXuatBanController::class);

Route::apiResource('TacGia', TacGiaController::class);

Route::apiResource('Sach', SachController::class);

Route::apiResource('TrangThaiDonHang', TrangThaiDonHang::class);

Route::apiResource('NhaCungCap', NhaCungCapController::class);

Route::apiResource('PhieuNhap', PhieuNhapController::class);

Route::apiResource('ChiTietPhieuNhap', ChiTietPhieuNhapController::class);

Route::apiResource('HoaDon', HoaDonController::class);

Route::apiResource('ChiTietHoaDon', ChiTietHoaDonController::class);