<?php

namespace App\Http\Controllers\Api;

use App\Models\Bus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Bus::query();

        // 🔍 Search berdasarkan nama atau email (opsional)
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nopol', 'like', "%$search%")
                    ->orWhere('tipe', 'like', "%$search%");
            });
        }

        // 📄 Pagination (default 10 per halaman)
        $bus = $query->paginate($request->input('per_page', 10));

        return response()->json([
            'success' => true,
            'message' => 'List data user',
            'data' => $bus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nopol' => 'required',
            'tahun_pembuatan' => 'required|string|max:255',
            'tipe' => 'nullable|string',
            'merek' => 'nullable|string',
            'kapasitas' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $foto = null;
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $foto = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('foto'), $foto);
            }


            $bus = Bus::create([
                'nopol'     => $request->nopol,
                'tahun_pembuatan'  => $request->tahun_pembuatan,
                'tipe'         => $request->tipe,
                'merek'  => $request->merek,
                'kapasitas'     => $request->kapasitas,
                'jenis_kendaraan'     => $request->jenis_kendaraan,
                'foto'           => $foto ? 'foto/' . $foto : null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User berhasil ditambahkan.',
                'data'    => $bus,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan user.',
                'error'   => $e->getMessage(),
            ], 500);
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
