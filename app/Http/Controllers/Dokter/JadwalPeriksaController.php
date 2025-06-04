<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jadwalPeriksas = JadwalPeriksa::where(column: 'id_dokter', operator: Auth::user()->id)->get();
        return view(view: 'dokter.jadwal-periksa.index')->with(key: ['jadwal_periksas' => $jadwalPeriksas,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dokter.jadwal-periksa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate(
            [
                'id_dokter' => 'required|exists:users,id', // Pastikan id_dokter ada di tabel users
                'hari' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
                'jam_mulai' => 'required|date_format:H:i',
                'jam_selesai' => 'required|date_format:H:i|after:jam_mulai', // jam_selesai harus setelah jam_mulai
                'status' => 'required|in:0,1', // Pastikan status adalah '0' atau '1'
            ],
            [
                // Pesan error kustom (opsional)
                'id_dokter.required' => 'ID Dokter tidak boleh kosong.',
                'id_dokter.exists' => 'ID Dokter tidak valid.',
                'hari.required' => 'Hari tidak boleh kosong.',
                'hari.in' => 'Hari yang dipilih tidak valid.',
                'jam_mulai.required' => 'Jam mulai tidak boleh kosong.',
                'jam_mulai.date_format' => 'Format jam mulai tidak valid (HH:MM).',
                'jam_selesai.required' => 'Jam selesai tidak boleh kosong.',
                'jam_selesai.date_format' => 'Format jam selesai tidak valid (HH:MM).',
                'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',
                'status.required' => 'Status tidak boleh kosong.',
                'status.in' => 'Status yang dipilih tidak valid.',
            ]
        );

        // 2. Buat instance JadwalPeriksa baru dan simpan ke database
        JadwalPeriksa::create($validatedData);

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('dokter.jadwal-periksa.index')->with('status', 'jadwal-periksa-created');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $jadwal = JadwalPeriksa::findOrFail($id);

        // Validasi request jika diperlukan, misalnya:
        // $request->validate([
        //     'status' => 'required|in:Aktif,Nonaktif',
        // ]);

        // Update status jadwal periksa
        $jadwal->status = $request->input('status');
        $jadwal->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('dokter.jadwal-periksa.index')->with('status', 'jadwal-periksa-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
