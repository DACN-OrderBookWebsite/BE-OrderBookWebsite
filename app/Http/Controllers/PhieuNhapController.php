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
        $TrangThai = TrangThaiDonHang::all();
        $NhanVien = NguoiDung::all();
        $NhaCungCap = NhaCungCap::all();
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
        
        $TrangThai = TrangThaiDonHang::all();
        $NhanVien = NguoiDung::all();
        $NhaCungCap = NhaCungCap::all();
        return response()->json([
            "TrangThai" => $TrangThai,
            "NhanVien" => $NhanVien,
            "NhaCungCap" => $NhaCungCap,

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
        $data->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = PhieuNhap::findOrFail($id);
        $data->delete();
    }
    public function getDataByidTrangThai($idTrangThai)
    {
        //return PhieuNhap::where('idTrangThai', $idTrangThai)->orderByDesc('NgayNhap')->get();
        return PhieuNhap::join('tbl_NguoiDung', 'tbl_NguoiDung.id', '=', 'tbl_PhieuNhap.idNhanVien')
                        ->join('tbl_NhaCungCap', 'tbl_NhaCungCap.id', '=', 'tbl_PhieuNhap.idNhaCungCap')
                        ->where('idTrangThai', $idTrangThai)
                        ->orderByDesc('NgayNhap')
                        ->select('tbl_PhieuNhap.*', 'tbl_NguoiDung.name as nameOfNhanVien', 'tbl_NhaCungCap.name as nameOfNhaCungCap')
                        ->get();
    }
}
