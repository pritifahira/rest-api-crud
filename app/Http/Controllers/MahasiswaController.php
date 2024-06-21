<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Resources\MahasiswaResource;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return MahasiswaResource::collection($mahasiswa);
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return new MahasiswaResource($mahasiswa);
    }
}
