<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bus = Bus::all();
        return view('page.bus.index', compact('bus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.bus.create');
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


        $foto = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $foto = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto'), $foto);
        }


        Bus::create([
            'nopol'     => $request->nopol,
            'tahun_pembuatan'  => $request->tahun_pembuatan,
            'tipe'         => $request->tipe,
            'merek'  => $request->merek,
            'kapasitas'     => $request->kapasitas,
            'jenis_kendaraan'     => $request->jenis_kendaraan,
            'foto'           => $foto ? 'foto/' . $foto : null,
        ]);

        return redirect()->route('bus.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bus = Bus::findOrFail($id);

        return view('page.bus.edit', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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

        $bus = Bus::findOrFail($id);


        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $foto = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto'), $foto);
            $bus->foto = 'foto/' . $foto;
        }

        $bus->nopol    = $request->nopol;
        $bus->tahun_pembuatan = $request->tahun_pembuatan;
        $bus->tipe        = $request->tipe;
        $bus->merek = $request->merek;
        $bus->kapasitas    = $request->kapasitas;
        $bus->jenis_kendaraan    = $request->jenis_kendaraan;
        $bus->save();

        return redirect()->route('bus.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        //
    }
}
