<?php

namespace App\Http\Controllers;

use App\Models\NhaXuatBan;
use App\Models\Sach;
use App\Models\TacGia;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Sach::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $TheLoai = TheLoai::all();
        $NhaXuatBan = NhaXuatBan::all();
        $TacGia = TacGia::all();

        return response()->json([
            "TheLoai" => $TheLoai,
            "NhaXuatBan" => $NhaXuatBan,
            "TacGia" => $TacGia
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
            'idTheLoai' => 'required|exists:tbl_TheLoai,id',
            'idNhaXuatBan'=>'required|exists:tbl_NhaXuatBan,id',
            'idTacGia'=>'required|exists:tbl_TacGia,id',
            'DonGia' => 'required',
            'SoLuongTon' => 'required',
            'Anh' => 'required',
            'Disabled' => 'required'
        ]);
        $Sach = $request->except(["Disabled"]);
        $Sach["Disabled"] = $request["Disabled"] ? 1 : 0;
        Sach::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Sach::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $TheLoai = TheLoai::all();
        $NhaXuatBan = NhaXuatBan::all();
        $TacGia = TacGia::all();

        return response()->json([
            "TheLoai" => $TheLoai,
            "NhaXuatBan" => $NhaXuatBan,
            "TacGia" => $TacGia,
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
            'idTheLoai' => 'required|exists:tbl_TheLoai,id',
            'idNhaXuatBan'=>'required|exists:tbl_NhaXuatBan,id',
            'idTacGia'=>'required|exists:tbl_TacGia,id',
            'DonGia' => 'required',
            'SoLuongTon' => 'required',
            'Anh' => 'required',
            'Disabled' => 'required'
        ]);
        $data = Sach::findOrFail($id);
        $Sach = $request->except(["Disabled"]);
        $Sach["Disabled"] = $request["Disabled"] ? 1 : 0;
        $data->update($Sach);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Sach::findOrFail($id);
        $data->delete();
    }
    public function updateSoLuongSanPhamByPhieuNhap(Request $request, $id)
    {
        $request->validate([
            'SoLuongTon' => 'required',
        ]);
        $data = Sach::findOrFail($id);
        $data->update($request->all());
    }
}
