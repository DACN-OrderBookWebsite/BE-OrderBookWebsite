<?php

namespace App\Http\Controllers;

use App\Models\NhaXuatBan;
use Illuminate\Http\Request;

class NhaXuatBanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NhaXuatBan::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required'
        ]);

        NhaXuatBan::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return NhaXuatBan::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required'
        ]);
    
        $NhaXuatBan = NhaXuatBan::findOrFail($id);
        $NhaXuatBan->update($request->all());

        return response()->json($NhaXuatBan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $NhaXuatBan = NhaXuatBan::findOrFail($id);
        $NhaXuatBan->delete();
    }
}
