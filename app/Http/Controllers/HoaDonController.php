<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\NguoiDung;
use App\Models\TrangThaiDonHang;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HoaDon::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $TrangThai = TrangThaiDonHang::all();
        $NhanVien = NguoiDung::all();
        $KhachHang = NguoiDung::all();
        return response()->json([
            "TrangThai" => $TrangThai,
            "NhanVien" => $NhanVien,
            "KhachHang" => $KhachHang
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id' => 'required',
            'NgayXuat' => 'required',
            //'NgayNhanHang' => 'required',
            'TongSoLuong' => 'required',
            'TongTien' => 'required',
            'isGroup' => 'required',
            'idTrangThai' => 'required|exists:tbl_TrangThaiDonHang,id',
            'idNhanVien'=>'required|exists:tbl_NguoiDung,id',
            'idKhachHang'=>'required|exists:tbl_NguoiDung,id',
        ]);

        HoaDon::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return HoaDon::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $TrangThai = TrangThaiDonHang::all();
        $NhanVien = NguoiDung::all();
        $KhachHang = NguoiDung::all();
        return response()->json([
            "TrangThai" => $TrangThai,
            "NhanVien" => $NhanVien,
            "KhachHang" => $KhachHang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'id' => 'required',
            'NgayXuat' => 'required',
            //'NgayNhanHang' => 'required',
            'TongSoLuong' => 'required',
            'TongTien' => 'required',
            'isGroup' => 'required',
            'idTrangThai' => 'required|exists:tbl_TrangThaiDonHang,id',
            'idNhanVien'=>'required|exists:tbl_NguoiDung,id',
            'idKhachHang'=>'required|exists:tbl_NguoiDung,id',
        ]);
        $data = HoaDon::findOrFail($id);
        $data->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = HoaDon::findOrFail($id);
        $data->delete();
    }
}
