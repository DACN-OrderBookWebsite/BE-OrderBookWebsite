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
        $TheLoai = TheLoai::all()->select(
            "id as value",
            "name as label"
        )->get();
        $NhaXuatBan = NhaXuatBan::all()->select(
            "id as value",
            "name as label"
        )->get();
        $TacGia = TacGia::all()->select(
            "id as value",
            "name as label"
        )->get();

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
            'id' => 'required',
            'name' => 'required',
            'idTheLoai' => 'required|exists:TheLoai,id',
            'idNhaXuatBan'=>'required|exists:NhaXuatBan,id',
            'idTacGia'=>'required|exists:TacGia,id',
            'DonGia' => 'required',
            'SoLuongTon' => 'required',
            'Sach' => 'required',
            'Disabled' => 'required'
        ]);

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
        $data = Sach::findOrFail($id);
        $TheLoai = TheLoai::all()->select(
            "id as value",
            "name as label"
        )->get();
        $NhaXuatBan = NhaXuatBan::all()->select(
            "id as value",
            "name as label"
        )->get();
        $TacGia = TacGia::all()->select(
            "id as value",
            "name as label"
        )->get();

        return response()->json([
            "TheLoai" => $TheLoai,
            "NhaXuatBan" => $NhaXuatBan,
            "TacGia" => $TacGia,
            "Sach" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'idTheLoai' => 'required|exists:TheLoai,id',
            'idNhaXuatBan'=>'required|exists:NhaXuatBan,id',
            'idTacGia'=>'required|exists:TacGia,id',
            'DonGia' => 'required',
            'SoLuongTon' => 'required',
            'Sach' => 'required',
            'Disabled' => 'required'
        ]);
        $data = Sach::findOrFail($id);
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
}