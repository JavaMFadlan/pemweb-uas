<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class PasienApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $pasien = Pasien::all();
        return response()->json($pasien);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $response = Pasien::create([
            "nama" => $request->input('nama_pasien'),
            "tgl_lahir" => $request->input('tgl'),
            "gender" => $request->input('jenis'),
            "berat_badan" => $request->input('berat'),
            "tinggi_badan" => $request->input('tinggi'),
            "penyakit_khusus" => $request->input('penyakit'),
            'username' => 'test',
            'email' => 'email@gmail.com',
            'password' => Hash::make('test'),
        ]);

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $pasien = Pasien::find($id);

        if (!$pasien) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json($pasien);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $pasien = Pasien::find($id);

        if (!$pasien) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $nama_pasien = $request->input('nama_pasien');
        // Check if "nama_pasien" is present in the request and is not null
        if ($nama_pasien !== null) {
            $pasien->update([
                "nama" => $nama_pasien,
                "tgl_lahir" => $request->input('tgl'),
                "gender" => $request->input('jenis'),
                "berat_badan" => $request->input('berat'),
                "tinggi_badan" => $request->input('tinggi'),
                "penyakit_khusus" => $request->input('penyakit'),
            ]);

            return response()->json(['message' => 'Record updated successfully']);
        } else {
            return response()->json(['message' => 'Nama cannot be null'], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $pasien = Pasien::find($id);

        if (!$pasien) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $pasien->delete();

        return response()->json(['message' => 'Record deleted successfully']);
    }
}
