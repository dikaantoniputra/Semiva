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
        // Validasi input
        $validated = $request->validate([
            'nopol'     => 'required|string',
            'tahun_pembuatan' => 'required|string',
            'tipe' => 'required|string',
            'merek' => 'nullable',
            'kapasitas'     => 'nullable',
            'jenis_kendaraan'   => 'nullable|string', // Di DB default string '0', tapi idealnya ubah ke boolean
        ]);

        try {

            $user = new Bus([
                'nopol'     => $validated['nopol'],
                'tahun_pembuatan' => $validated['tahun_pembuatan']  ?? null,
                'tipe' => $validated['tipe']  ?? null,
                'merek' => $validated['merek'] ?? null,
                'kapasitas'     => $validated['kapasitas'] ?? null,
                'jenis_kendaraan'   => $validated['jenis_kendaraan'] ?? false,
            ]);


            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'User berhasil ditambahkan.',
                'data'    => $user,
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bus = Bus::find($id);

        if (!$bus) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $bus,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bus = Bus::find($id);

        if (!$bus) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.',
            ], 404);
        }

        $validated = $request->validate([
            'nopol'     => 'required|string',
            'tahun_pembuatan' => 'required|string',
            'tipe' => 'required|string',
            'merek' => 'nullable',
            'kapasitas'     => 'nullable',
            'jenis_kendaraan'   => 'nullable|string', // Di DB default string '0', tapi idealnya ubah ke boolean
        ]);

        try {
            // Hash password jika diinput dan berbeda
            $bus->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'User berhasil diperbarui.',
                'data' => $bus,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui user.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $user = User::find($id);

    //     if (!$user) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'User tidak ditemukan.',
    //         ], 404);
    //     }

    //     try {
    //         $user->delete();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'User berhasil dihapus.',
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Gagal menghapus user.',
    //             'error' => $e->getMessage(),
    //         ], 500);
    //     }
    // }
}
