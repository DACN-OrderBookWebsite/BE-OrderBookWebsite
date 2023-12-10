<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Lấy thông tin đăng nhập từ request
        $tenDangNhap = $request->input('TenDangNhap');
        $matKhau = $request->input('MatKhau');

        // Tìm người dùng dựa trên tên đăng nhập
        $nguoiDung = NguoiDung::where('TenDangNhap', $tenDangNhap)->first();

        // Kiểm tra xem người dùng có tồn tại và mật khẩu có khớp không
        if ($nguoiDung && Hash::check($matKhau, $nguoiDung->getAuthPassword())) {
            // Tạo token nếu xác thực thành công
            $token = $nguoiDung->createToken('Personal Access Token')->accessToken;
            Log::info('Xác thực thành công cho người dùng: ' . $tenDangNhap);

            return response()->json(['message' => 'Đăng nhập thành công'])
            ->cookie('token', $token, 60, null, null, false, true); // Đặt token vào cookie
        } else {
            // Ghi log và trả về lỗi nếu xác thực thất bại
            Log::warning('Xác thực thất bại cho người dùng: ' . $tenDangNhap);
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
