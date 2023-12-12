<?php

namespace App\Http\Controllers;

use App\Models\ChiTietHoaDon;
use App\Models\Sach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiTietHoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ChiTietHoaDon::all();
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
            'DonGia' => 'required',
            'idHoaDon' => 'required|exists:tbl_HoaDon,id',
            'idSanPham' => 'required|exists:tbl_Sach,id',
        ]);

        ChiTietHoaDon::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return ChiTietHoaDon::findOrFail($id);
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
            'DonGia' => 'required',
            'idHoaDon' => 'required|exists:tbl_HoaDon,id',
            'idSanPham' => 'required|exists:tbl_Sach,id',
        ]);
        $data = ChiTietHoaDon::findOrFail($id);
        $data->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = ChiTietHoaDon::findOrFail($id);
        $data->delete();
    }
    public function getDataByidHoaDonAndNameOfSanPham($idHoaDon)
    {
        return ChiTietHoaDon::where('idHoaDon', $idHoaDon)->select('tbl_ChiTietHoaDon.*', 'tbl_Sach.name as name')
        ->join('tbl_Sach', 'tbl_ChiTietHoaDon.idSanPham', '=', 'tbl_Sach.id')
        ->get();
    }
    public function getDataByCheckSanPhamIsInsertedToHoaDon($idHoaDon, $idSanPham)
    {
        return ChiTietHoaDon::where('idHoaDon', $idHoaDon)->where('idSanPham', $idSanPham)->get();
    }
    public function calculateTongTienOfHoaDon($idHoaDon)
    {
        $TongTien =  ChiTietHoaDon::where('idHoaDon', $idHoaDon)->sum(DB::raw('DonGia * SoLuong'));
        return response()->json([
            "TongTien" => $TongTien,
        ]);
    }
    public function sumSoLuongOfHoaDon($idHoaDon)
    {
        $TongSoLuong =  ChiTietHoaDon::where('idHoaDon', $idHoaDon)->sum(DB::raw('SoLuong'));
        return response()->json([
            "TongSoLuong" => $TongSoLuong,
        ]);
    }
    public function deleteByHoaDon($idHoaDon)
    {
        ChiTietHoaDon::where('idHoaDon', $idHoaDon)->delete();
    }
    public function getDataByHoaDon($idHoaDon)
    {
        return ChiTietHoaDon::where('idHoaDon', $idHoaDon)->get();
    }
}
