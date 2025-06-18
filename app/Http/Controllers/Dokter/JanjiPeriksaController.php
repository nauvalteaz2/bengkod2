<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JanjiPeriksa;

class JanjiPeriksaController extends Controller
{
    //
    public function index()
    {
        //
        $janji = JanjiPeriksa::with(['pasien', 'jadwalPeriksa.dokter.poli'])->latest()->get();
        return view('dokter.janji-periksa.index', compact('janji'));
    }
}
