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
        $Quyen = Quyen::all()->select(
            "id as value",
            "name as label"
        )->get();

        $Nhom = Nhom::all()->select(
            "id as value",
            "name as label"
        )->get();

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
            'id' => 'required',
            'idQuyen' => 'required|exists:Quyen,id',
            'idNhom'=>'required|exists:Nhom,id'
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
        $PhanQuyen = PhanQuyen::findOrFail($id);
        $Quyen = Quyen::all()->select(
            "id as value",
            "name as label"
        )->get();

        $Nhom = Nhom::all()->select(
            "id as value",
            "name as label"
        )->get();

        return response()->json([
            "Quyen" => $Quyen,
            "Nhom" => $Nhom,
            "PhanQuyen" => $PhanQuyen
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'idQuyen' => 'required|exists:Quyen,id',
            'idNhom'=>'required|exists:Nhom,id'
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
}
