<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::all();
        return response()->json(['data' => $matakuliah]);
    }

    public function show($id)
    {
        $matakuliah = Matakuliah::find($id);
        
        if (!$matakuliah) {
            return response()->json(['message' => 'matakuliah not found'], 404);
        }

        return response()->json(['data' => $matakuliah]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'sks' => 'required'
        ]);

        $matakuliah = Matakuliah::create($request->all());

        return response()->json(['message' => 'matakuliah created successfully', 'data' => $matakuliah], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'sks' => 'required'
        ]);

        $matakuliah = Matakuliah::find($id);
        
        if (!$matakuliah) {
            return response()->json(['message' => 'matakuliah not found'], 404);
        }

        $matakuliah->update($request->all());

        return response()->json(['message' => 'matakuliah updated successfully', 'data' => $matakuliah]);
    }

    public function destroy($id)
    {
        $matakuliah = Matakuliah::find($id);
        
        if (!$matakuliah) {
            return response()->json(['message' => 'matakuliah not found'], 404);
        }

        $matakuliah->delete();

        return response()->json(['message' => 'matakuliah deleted successfully']);
    }
}
