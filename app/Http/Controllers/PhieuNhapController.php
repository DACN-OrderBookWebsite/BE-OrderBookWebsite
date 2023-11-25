<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use App\Models\NhaCungCap;
use App\Models\PhieuNhap;
use App\Models\TrangThaiDonHang;
use Illuminate\Http\Request;

class PhieuNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PhieuNhap::all();
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
        $NhaCungCap = NhaCungCap::all()->select(
            'id as value',
            'name as label'
        )->get();
        return response()->json([
            "TrangThai" => $TrangThai,
            "NhanVien" => $NhanVien,
            "NhaCungCap" => $NhaCungCap
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id' => 'required',
            'NgayNhap' => 'required',
            'NgayNhanHang' => 'required',
            'TongSoLuong' => 'required',
            'TongTien' => 'required',
            'idTrangThai' => 'required|exists:tbl_TrangThaiDonHang,id',
            'idNhanVien'=>'required|exists:tbl_NguoiDung,id',
            'idNhaCungCap'=>'required|exists:tbl_NhaCungCap,id',
        ]);

        PhieuNhap::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return PhieuNhap::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = PhieuNhap::findOrFail($id);
        $TrangThai = TrangThaiDonHang::all()->select(
            'id as value',
            'name as label'
        )->get();
        $NhanVien = NguoiDung::all()->select(
            'id as value',
            'name as label'
        )->get();
        $NhaCungCap = NhaCungCap::all()->select(
            'id as value',
            'name as label'
        )->get();
        return response()->json([
            "TrangThai" => $TrangThai,
            "NhanVien" => $NhanVien,
            "NhaCungCap" => $NhaCungCap,
            "PhieuNhap" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'id' => 'required',
            'NgayNhap' => 'required',
            'NgayNhanHang' => 'required',
            'TongSoLuong' => 'required',
            'TongTien' => 'required',
            'idTrangThai' => 'required|exists:tbl_TrangThaiDonHang,id',
            'idNhanVien'=>'required|exists:tbl_NguoiDung,id',
            'idNhaCungCap'=>'required|exists:tbl_NhaCungCap,id',
        ]);
        $data = PhieuNhap::findOrFail($id);
        $data->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = PhieuNhap::findOrFail($id);
        $data->delete();
    }
}
