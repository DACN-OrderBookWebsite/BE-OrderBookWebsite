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
            'idNhaXuatBan' => 'required|exists:tbl_NhaXuatBan,id',
            'idTacGia' => 'required|exists:tbl_TacGia,id',
            'DonGia' => 'required',
            'SoLuongTon' => 'required',
            'Anh' => 'required',
            'Disabled' => 'required',
            'NamXuatBan' => 'required'
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
            'idNhaXuatBan' => 'required|exists:tbl_NhaXuatBan,id',
            'idTacGia' => 'required|exists:tbl_TacGia,id',
            'DonGia' => 'required',
            'SoLuongTon' => 'required',
            'Anh' => 'required',
            'Disabled' => 'required',
            'NamXuatBan' => 'required'
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
    public function getDataSortByTheLoai()
    {
        $sachData = Sach::all()->sortBy('idTheLoai');

        $formattedData = $sachData->map(function ($sach) {
            return [
                'id' => $sach->id,
                'name' => $sach->name,
                'price' => $sach->DonGia,
                'stock' => $sach->SoLuongTon,
                'image' => $sach->Anh,
            ];
        });

        return $formattedData->values()->all();
    }
    public function showDataWithoutID($id)
    {
        $sachData = Sach::join('tbl_TheLoai', 'tbl_Sach.idTheLoai', '=', 'tbl_TheLoai.id')
            ->join('tbl_TacGia', 'tbl_Sach.idTacGia', '=', 'tbl_TacGia.id')
            ->join('tbl_NhaXuatBan', 'tbl_Sach.idNhaXuatBan', '=', 'tbl_NhaXuatBan.id')
            ->where('tbl_Sach.id', '=', $id)
            ->select('tbl_Sach.*', 'tbl_TheLoai.name as nameOfTheLoai', 'tbl_TacGia.name as nameOfTacGia', 'tbl_NhaXuatBan.name as nameOfNhaXuatBan')
            ->first();

        // Check if $sachData is not null before proceeding
        if ($sachData) {
            $formattedData = $sachData;
            $formattedData['price'] = $formattedData['DonGia'];
            $formattedData['stock'] = $formattedData['SoLuongTon'];
            $formattedData['image'] = $formattedData['Anh'];
        }
        return $formattedData;
    }

    public function getDataSach_NhaXuatBan_TacGia_TheLoai()
    {
        return Sach::join('tbl_NhaXuatBan', 'tbl_NhaXuatBan.id', '=', 'tbl_Sach.idNhaXuatBan')
            ->join('tbl_TacGia', 'tbl_TacGia.id', '=', 'tbl_Sach.idTacGia')
            ->join('tbl_TheLoai', 'tbl_TheLoai.id', '=', 'tbl_Sach.idTheLoai')
            ->orderBy('tbl_Sach.name')
            ->select('tbl_Sach.*', 'tbl_TacGia.name as nameOfTacGia', 'tbl_NhaXuatBan.name as nameOfNhaXuatBan', 'tbl_TheLoai.name as nameOfTheLoai')
            ->get();
    }
    public function getDataByTheLoai($idTheLoai)
    {
        $sachData = Sach::where('idTheLoai', '=', $idTheLoai)->get();

        $formattedData = $sachData->map(function ($sach) {
            return [
                'id' => $sach->id,
                'name' => $sach->name,
                'price' => $sach->DonGia,
                'stock' => $sach->SoLuongTon,
                'image' => $sach->Anh,
            ];
        });

        return $formattedData->values()->all();
    }
    public function getDataByTheLoaiSort($idTheLoai, $sort)
    {
        $sachData = Sach::where('idTheLoai', $idTheLoai);

        if ($sort == 1) {
            $sachData->orderBy('name');
        } elseif ($sort == 2) {
            $sachData->orderBy('DonGia');
        } else {
            $sachData->orderByDesc('DonGia');
        }

        $sachData = $sachData->get();

        $formattedData = $sachData->map(function ($sach) {
            return [
                'id' => $sach->id,
                'name' => $sach->name,
                'price' => $sach->DonGia,
                'stock' => $sach->SoLuongTon,
                'image' => $sach->Anh,
            ];
        });

        return $formattedData->values()->all();
    }
    public function search($data)
    {
        $sachData = Sach::where('name', 'like', '%' . $data . '%')->get();

        $formattedData = $sachData->map(function ($sach) {
            return [
                'id' => $sach->id,
                'name' => $sach->name,
                'price' => $sach->DonGia,
                'stock' => $sach->SoLuongTon,
                'image' => $sach->Anh,
            ];
        });

        return $formattedData->values()->all();
    }
}
