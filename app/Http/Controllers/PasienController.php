<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(asset('/plugins/fontawesome-free/css/all.min.css'));
        $total_pasien = Pasien::all()->count();
        $total_pasien_bulan_ini = Pasien::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $total_user = User::all()->count();
        $total_user_bulan_ini = User::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        return view('index', compact('total_pasien','total_pasien_bulan_ini','total_user','total_user_bulan_ini'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.create');
    }

    public function test_list()
    {
        return view('pasien.test-list');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $response = Pasien::insert([
            "nama" => $request->nama_pasien,
            "tgl_lahir" => $request->tgl,
            "gender" => $request->jenis,
            "berat_badan" => $request->berat,
            "tinggi_badan" => $request->tinggi,
            "penyakit_khusus" => $request->penyakit,
            'username' => 'test',
            'email' => 'email@gmail.com',
            'password' => bcrypt('test'),
        ]);

        if ($response) {
            return redirect()->route('pasien.test_list');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pasien = Pasien::find($id);
        return view('pasien.edit', compact('pasien', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id = null)
    {
        $pasien = Pasien::find($id);

        // $request->nama_pasien,
            // "tgl_lahir" => $request->tgl,
            // "gender" => $request->jenis,
            // "berat_badan" => $request->berat,
            // "tinggi_badan" => $request->tinggi,
            // "penyakit_khusus" => $request->penyakit,
        // Update the Pasien attributes
        $pasien->nama = $request->input('nama_pasien');
        $pasien->tgl_lahir = $request->input('tgl');
        $pasien->gender = $request->input('jenis');
        $pasien->berat_badan = $request->input('berat');
        $pasien->tinggi_badan = $request->input('tinggi');
        $pasien->penyakit_khusus = $request->input('penyakit');

        // Save the updated Pasien
        $pasien->save();

        return redirect()->route('pasien.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::find($id);
        if (!$pasien) {
            // Handle case where the record with the given ID was not found
            return response()->json(['message' => 'Record not found'], 404);
        }

        // Delete the record
        $pasien->delete();

        // Respond with success message
        return redirect()->route('pasien.index');
    }

    public function datatables(Request $request)
    {
        $table = DataTables::of(Pasien::all());
        return $table
            ->addColumn('action', function ($data) {
                    $button = '<button class="btn btn-primary btn-sm" onclick="update(' .$data->id. ')">Update</button>' .
                    '<button class="btn btn-danger btn-sm" onclick="destroy(' .$data->id. ')">Delete</button>';
                return "<div class='btn-group btn-group-sm' role='group'>"
                .$button.

                "</div>";
            })
            ->addColumn('gender', function ($data) {
                        return $data->gender == 'lk' ? 'Laki-laki' : 'Perempuan';
                })
            ->rawColumns(['action'])
            ->make(true);
    }
}
