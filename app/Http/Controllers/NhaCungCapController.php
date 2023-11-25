<?php

namespace App\Http\Controllers;

use App\Models\NhaCungCap;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NhaCungCap::all();
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
            'name' => 'required',
            'SDT' => 'required|unique:tbl_NhaCungCap,SDT',
            'DiaChi' => 'required',
            'Email' => 'required|unique:tbl_NhaCungCap,Email|email'
        ]);
        NhaCungCap::create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return NhaCungCap::findOrFail($id);
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
            'name' => 'required',
            'SDT' => [
                'required',
                Rule::unique('tbl_NhaCungCap', 'SDT')->ignore($request->id),
            ],
            'DiaChi' => 'required',
            'Email' => [
                'required',
                'email',
                Rule::unique('tbl_NhaCungCap', 'Email')->ignore($request->id),
            ]
        ]);

        $data = NhaCungCap::findOrFail($id);
        $data->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = NhaCungCap::findOrFail($id);
        $data->delete();
    }
}
