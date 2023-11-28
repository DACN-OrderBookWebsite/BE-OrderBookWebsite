<?php

namespace App\Http\Controllers;

use App\Models\Nhom;
use App\Models\PhanQuyen;
use App\Models\Quyen;
use Illuminate\Http\Request;

class PhanQuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PhanQuyen::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Quyen = Quyen::all();

        $Nhom = Nhom::all();

        return response()->json([
            "Quyen" => $Quyen,
            "Nhom" => $Nhom,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id' => 'required',
            'idQuyen' => 'required|exists:tbl_Quyen,id',
            'idNhom'=>'required|exists:tbl_Nhom,id'
        ]);

        PhanQuyen::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return PhanQuyen::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Quyen = Quyen::all();

        $Nhom = Nhom::all();

        return response()->json([
            "Quyen" => $Quyen,
            "Nhom" => $Nhom,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'id' => 'required',
            'idQuyen' => 'required|exists:tbl_Quyen,id',
            'idNhom'=>'required|exists:tbl_Nhom,id'
        ]);
    
        $PhanQuyen = PhanQuyen::findOrFail($id);
        $PhanQuyen->update($request->all());

        return response()->json($PhanQuyen);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $PhanQuyen = PhanQuyen::findOrFail($id);
        $PhanQuyen->delete();
    }
    public function getDataByidNhom($idNhom)
    {
        $phanQuyen = PhanQuyen::where('idNhom', $idNhom)->get();

        return response()->json($phanQuyen);
    }
    public function checkQuyen($idNguoiDung, $idQuyen)
    {
        // Kiểm tra xem người dùng có idQuyen tương ứng trong bảng PhanQuyen hay không
        $result = PhanQuyen::where('idNhom', function ($query) use ($idNguoiDung) {
                $query->select('idNhom')
                    ->from('tbl_NhomNguoiDung')
                    ->where('idNguoiDung', $idNguoiDung);
            })
            ->where('idQuyen', $idQuyen)
            ->exists();

        // Trả về kết quả true hoặc false
        return response()->json(['result' => $result]);
    }
}
