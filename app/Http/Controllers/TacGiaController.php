<?php

namespace App\Http\Controllers;

use App\Models\TacGia;
use Illuminate\Http\Request;

class TacGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TacGia::all();
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
            // 'id' => 'required',
            'name' => 'required'
        ]);

        TacGia::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return TacGia::findOrFail($id);
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
            // 'id' => 'required',
            'name' => 'required'
        ]);
    
        $data = TacGia::findOrFail($id);
        $data->update($request->all());

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = TacGia::findOrFail($id);
        $data->delete();
    }
}
