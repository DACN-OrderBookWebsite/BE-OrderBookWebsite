<?php

namespace App\Http\Controllers;

use App\Models\Quyen;
use Illuminate\Http\Request;

class QuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Quyen::all();
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

        Quyen::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Quyen::findOrFail($id);
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
    
        $Quyen = Quyen::findOrFail($id);
        $Quyen->update($request->all());

        return response()->json($Quyen);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Quyen = Quyen::findOrFail($id);
        $Quyen->delete();
    }
}
