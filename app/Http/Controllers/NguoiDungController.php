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
        $ChucVu = ChucVu::all()->select(
            "id as value",
            "name as label"
        )->get();
        return response()->json([
            "ChucVu" => $ChucVu
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
            'TenDangNhap' => 'required|unique:tbl_NguoiDung,TenDangNhap',
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
        $ChucVu = ChucVu::all()->select(
            "id as value",
            "name as label"
        )->get();
        $NguoiDung = NguoiDung::findOrFail($id)->select()->get();
        return response()->json([
            "ChucVu" => $ChucVu,
            "NguoiDung" => $NguoiDung
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
                Rule::unique('tbl_NguoiDung', 'TenDangNhap')->ignore($request->id),
            ],
            'MatKhau' => 'required|min:6',
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
    public function doiMatKhau(Request $request, $id)
    {
        $request->validate([
            'MatKhau' => 'required|confirmed|min:6',
        ]);
    
        $data = NguoiDung::findOrFail($id);

        $data->update([
            'MatKhau' => bcrypt($request->MatKhau),
        ]);
    }
}
