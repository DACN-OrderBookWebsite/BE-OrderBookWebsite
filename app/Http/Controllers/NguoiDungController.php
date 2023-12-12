<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class NguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NguoiDung::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ChucVu = ChucVu::all();
        
        return response()->json([
            'ChucVu' => $ChucVu->all(),
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id' => 'required',
            'name' => 'required',
            'TenDangNhap' => 'required|unique:tbl_NguoiDung,TenDangNhap|min:6',
            'MatKhau' => 'required|confirmed|min:6',
            'SDT' => 'required|unique:tbl_NguoiDung,SDT',
            //'DiaChi' => 'required',
            'Email' => 'required|unique:tbl_NguoiDung,Email|email',
            //'NgayTao' => 'required',
            //'NgayThayDoi' => 'required',
            //'NgaySinh' => 'required',
            'Disabled' => 'required',
            'idChucVu' => 'required|exists:tbl_ChucVu,id',
            'GioiTinh' => 'required',
            'Anh' => 'required'
        ]);
        $NguoiDung = $request->except(["MatKhau","MatKhau_confirmation","Disabled"]);
        $NguoiDung["MatKhau"] = Hash::make($request["MatKhau"]);
        $NguoiDung["Disabled"] = $request["Disabled"] ? 1 : 0;
        NguoiDung::create($NguoiDung);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return NguoiDung::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ChucVu = ChucVu::all();
        return response()->json([
            "ChucVu" => $ChucVu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'id' => 'required',
            'name' => 'required',
            'TenDangNhap' => [
                'required',
                'min:6',
                Rule::unique('tbl_NguoiDung', 'TenDangNhap')->ignore($request->id),
            ],
            // 'MatKhau' => 'required|min:6',
            'SDT' => [
                'required',
                Rule::unique('tbl_NguoiDung', 'SDT')->ignore($request->id),
            ],
            //'DiaChi' => 'required',
            'Email' => [
                'required',
                'email',
                Rule::unique('tbl_NguoiDung', 'Email')->ignore($request->id),
            ],
            //'NgayTao' => 'required',
            //'NgayThayDoi' => 'required',
            'Disabled' => 'required',
            'idChucVu' => 'required|exists:tbl_ChucVu,id',
            'GioiTinh' => 'required',
            'Anh' => 'required'
        ]);

        $data = NguoiDung::findOrFail($id);
        $NguoiDung = $request->except(["Disabled","MatKhau","MatKhau_confirmation"]);
        $NguoiDung["Disabled"] = $request["Disabled"] ? 1 : 0;
        $data->update($NguoiDung);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $NguoiDung = NguoiDung::findOrFail($id);
        $NguoiDung->delete();
    }
    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'MatKhau' => 'required|confirmed|min:6',
        ]);
    
        $data = NguoiDung::findOrFail($id);

        $data->update([
            'MatKhau' => bcrypt($request->MatKhau),
        ]);
    }
    public function checkLogin($username, $password)
    {
        $user = NguoiDung::where('TenDangNhap', $username)->first();

        if ($user && Hash::check($password, $user->MatKhau)) {
            // Đăng nhập thành công
            return response()->json(['success' => true]);
        } else {
            // Sai tên đăng nhập hoặc mật khẩu
            return response()->json(['success' => false]);
        }
    }
    public function getDataIsNotAddByGroup($idNhom)
    {
        // Sử dụng model NguoiDung và NhomNguoiDung để lấy các quyền chưa được thêm vào bảng NhomNguoiDung
        $missingPermissions = NguoiDung::whereNotIn('id', function ($query) use ($idNhom) {
            $query->select('idNguoiDung')
                ->from('tbl_NhomNguoiDung')
                ->where('idNhom', $idNhom);
        })->get();

        // Trả về kết quả dưới dạng JSON
        return response()->json($missingPermissions);
    }
    public function getDataByTenDangNhap($username)
    {
        return NguoiDung::where('TenDangNhap', $username)->first();
    }
}
