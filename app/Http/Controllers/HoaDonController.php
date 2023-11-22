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
        $TrangThai = TrangThaiDonHang::all()->select(
            'id as value',
            'name as label'
        )->get();
        $NhanVien = NguoiDung::all()->select(
            'id as value',
            'name as label'
        )->get();
        $KhachHang = NguoiDung::all()->select(
            'id as value',
            'name as label'
        )->get();
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
            'id' => 'required',
            'NgayXuat' => 'required',
            //'NgayNhanHang' => 'required',
            'TongSoLuong' => 'required',
            'TongTien' => 'required',
            'isGroup' => 'required',
            'idTrangThai' => 'required|exists:TrangThaiDonHang,id',
            'idNhanVien'=>'required|exists:NguoiDung,id',
            'idKhachHang'=>'required|exists:NguoiDung,id',
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
        $data = HoaDon::findOrFail($id);
        $TrangThai = TrangThaiDonHang::all()->select(
            'id as value',
            'name as label'
        )->get();
        $NhanVien = NguoiDung::all()->select(
            'id as value',
            'name as label'
        )->get();
        $KhachHang = NguoiDung::all()->select(
            'id as value',
            'name as label'
        )->get();
        return response()->json([
            "TrangThai" => $TrangThai,
            "NhanVien" => $NhanVien,
            "KhachHang" => $KhachHang,
            "HoaDon" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'NgayXuat' => 'required',
            //'NgayNhanHang' => 'required',
            'TongSoLuong' => 'required',
            'TongTien' => 'required',
            'isGroup' => 'required',
            'idTrangThai' => 'required|exists:TrangThaiDonHang,id',
            'idNhanVien'=>'required|exists:NguoiDung,id',
            'idKhachHang'=>'required|exists:NguoiDung,id',
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