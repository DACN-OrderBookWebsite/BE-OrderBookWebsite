<?php

namespace App\Http\Controllers;

use App\Models\Nhom;
use Illuminate\Http\Request;

class NhomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Nhom::all();
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

        Nhom::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Nhom::findOrFail($id);
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
    
        $Nhom = Nhom::findOrFail($id);
        $Nhom->update($request->all());

        return response()->json($Nhom);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Nhom = Nhom::findOrFail($id);
        $Nhom->delete();
    }
}
