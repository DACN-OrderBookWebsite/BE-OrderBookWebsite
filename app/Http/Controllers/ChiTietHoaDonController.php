<?php

namespace App\Http\Controllers;

use App\Models\ChiTietHoaDon;
use App\Models\Sach;
use Illuminate\Http\Request;

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
        $SanPham = Sach::all()->select(
            'id as value',
            'name as label'
        )->get();
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
            'id' => 'required',
            'SoLuong' => 'required',
            'DonGiaNhap' => 'required',
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
        $data = ChiTietHoaDon::findOrFail($id);
        $SanPham = Sach::all()->select(
            'id as value',
            'name as label'
        )->get();
        return response()->json([
            "SanPham" => $SanPham,
            "ChiTietHoaDon" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'SoLuong' => 'required',
            'DonGiaNhap' => 'required',
            'idSanPham' => 'required|exists:tbl_Sach,id',
        ]);
        $data = ChiTietHoaDon::findOrFail($id);
        $data->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = ChiTietHoaDon::findOrFail($id);
        $data->delete();
    }
}
