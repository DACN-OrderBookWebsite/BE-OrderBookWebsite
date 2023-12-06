<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhieuNhap;
use App\Models\Sach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiTietPhieuNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ChiTietPhieuNhap::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $SanPham = Sach::all();
        return response()->json([
            "SanPham" => $SanPham,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id' => 'required',
            'SoLuong' => 'required',
            'DonGiaNhap' => 'required',
            'idPhieuNhap' => 'required|exists:tbl_PhieuNhap,id',
            'idSanPham' => 'required|exists:tbl_Sach,id',
        ]);

        ChiTietPhieuNhap::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return ChiTietPhieuNhap::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $SanPham = Sach::all();
        return response()->json([
            "SanPham" => $SanPham,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'id' => 'required',
            'SoLuong' => 'required',
            'DonGiaNhap' => 'required',
            'idPhieuNhap' => 'required|exists:tbl_PhieuNhap,id',
            'idSanPham' => 'required|exists:tbl_Sach,id',
        ]);
        $data = ChiTietPhieuNhap::findOrFail($id);
        $data->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = ChiTietPhieuNhap::findOrFail($id);
        $data->delete();
    }

    public function getDataByidPhieuNhapAndNameOfSanPham($idPhieuNhap)
    {
        return ChiTietPhieuNhap::where('idPhieuNhap', $idPhieuNhap)->select('tbl_ChiTietPhieuNhap.*', 'tbl_Sach.name as name')
        ->join('tbl_Sach', 'tbl_ChiTietPhieuNhap.idSanPham', '=', 'tbl_Sach.id')
        ->get();
    }
    public function getDataByCheckSanPhamIsInsertedToPhieuNhap($idPhieuNhap, $idSanPham)
    {
        return ChiTietPhieuNhap::where('idPhieuNhap', $idPhieuNhap)->where('idSanPham', $idSanPham)->get();
    }
    public function calculateTongTienOfPhieuNhap($idPhieuNhap)
    {
        $TongTien =  ChiTietPhieuNhap::where('idPhieuNhap', $idPhieuNhap)->sum(DB::raw('DonGiaNhap * SoLuong'));
        return response()->json([
            "TongTien" => $TongTien,
        ]);
    }
    public function sumSoLuongOfPhieuNhap($idPhieuNhap)
    {
        $TongSoLuong =  ChiTietPhieuNhap::where('idPhieuNhap', $idPhieuNhap)->sum(DB::raw('SoLuong'));
        return response()->json([
            "TongSoLuong" => $TongSoLuong,
        ]);
    }
    public function deleteByPhieuNhap($idPhieuNhap)
    {
        ChiTietPhieuNhap::where('idPhieuNhap', $idPhieuNhap)->delete();
    }
    public function getDataByPhieuNhap($idPhieuNhap)
    {
        return ChiTietPhieuNhap::where('idPhieuNhap', $idPhieuNhap)->get();
    }
}
