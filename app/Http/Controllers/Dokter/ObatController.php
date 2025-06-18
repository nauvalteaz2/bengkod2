<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obats = obat::all();
        return view(view: 'dokter.obat.index')->with(key: ['obats' => $obats,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(view: 'dokter.obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan' => 'required|string|max:255',
            'harga'    => 'required|numeric|min:0',
        ]);

        Obat::create([
            'nama_obat' => $request->nama_obat,
            'kemasan'   => $request->kemasan,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('dokter.obat.index')->with('status', 'obat-created');
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
        $obat = Obat::find($id);
        return view('dokter.obat.edit')->with([
            'obat' => $obat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan'   => 'required|string|max:255',
            'harga'     => 'required|numeric|min:0',
        ]);

        $obat = Obat::find($id);
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'kemasan'   => $request->kemasan,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('dokter.obat.index')->with('status', 'obat-updated');
    }

    public function trash()
    {
        $obats = Obat::onlyTrashed()->get(); // Ambil obat yang terhapus (soft delete)
        return view('dokter.obat.trash', compact('obats'));
    }

    public function restore($id)
    {
        $obat = Obat::withTrashed()->findOrFail($id);
        $obat->restore();

        return redirect()->route('dokter.obat.trash')->with('success', 'Obat berhasil direstore.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = Obat::find($id);
        $obat->delete();

        return redirect()->route('dokter.obat.index');
    }
}
