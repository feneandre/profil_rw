<?php

namespace App\Http\Controllers\Kecamatan;

use App\Http\Controllers\Controller;
use App\Models\KontakRt;
use App\Models\KontakRw;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    private $kelurahan = [
        'KELURAHAN KESAMBI' => [
            'RW.01 KARANGANYAR',
            'RW.02 KARANGANYAR',
            'RW.03 SIGENDENG',
            'RW.04 KAMPUNG MELATI',
            'RW.05 KESAMBI BARU',
            'RW.06 ASRAMA TNI AD',
            'RW.07 WARNASARI'
        ],
        'KELURAHAN DRAJAT' => [
            'RW.01 DRAJAT',
            'RW.02 KARANG MULYA',
            'RW.03 KARANG MAKMUR',
            'RW.04 KESAMBI DALAM',
            'RW.05 HARAPAN MULYA',
            'RW.06 SIMAJA UTARA',
            'RW.07 TANAH BARU',
            'RW.08 SIMAJA SELATAN',
            'RW.09 JABANG BAYI'
        ],
        'KELURAHAN KARYAMULYA' => [
            'RW.01 KALIKEBAT',
            'RW.02 SICALUNG',
            'RW.03 KARYAMULYA',
            'RW.04 MEGA ENDAH',
            'RW.05 NUSA ENDAH',
            'RW.06 HARAPAN MULYA',
            'RW.07 KAYU WALANG',
            'RW.08 MAJASEM',
            'RW.09 SITUGANGGA',
            'RW.10 KARYA BHAKTI',
            'RW.11 MEKAR MULYA',
            'RW.12 MULYA INDAH',
            'RW.13 MEKAR SICALUNG',
            'RW.14 JEMBAR AGUNG',
            'RW.15 NUANSA MAJASEM',
            'RW.16 KARYA INDAH',
            'RW.17 MULYA SEJAHTERA',
            'RW.18 PURI TAMANSARI'
        ],
        'KELURAHAN PEKIRINGAN' => [
            'RW.01 GUNUNGSARI',
            'RW.02 GUNUNGSARI DALAM',
            'RW.03 LANGENSARI',
            'RW.04 LANGENSARI BARU',
            'RW.05 SIDAMULYA',
            'RW.06 SURADINAYA UTARA',
            'RW.07 GUNUNGSARI BEDENG',
            'RW.08 SURADINAYA SELATAN',
            'RW.09 SURADINAYA BARAT',
            'RW.10 SIDAMULYA UTARA',
            'RW.11 SIDAMULYA SELATAN'
        ],
        'KELURAHAN SUNYARAGI' => [
            'RW.01 KARANG YUDHA',
            'RW.02 TAMANSARI',
            'RW.03 KARANG BARU',
            'RW.04 LEBU',
            'RW.05 SIADEM',
            'RW.06 KARANG JALAK',
            'RW.07 KARANG JALAK MEKAR',
            'RW.08 MARGASARI',
            'RW.09 KARANG MALANG',
            'RW.10 YUDHASARI',
            'RW.11 BIMA INDAH'
        ]
    ];

    public function index(Request $request)
    {
        $kelurahan = array_keys($this->kelurahan);
        $rws = [];
        
        if ($request->filled('kelurahan')) {
            $rws = $this->kelurahan[$request->kelurahan] ?? [];
        }
        
        $kontakRw = KontakRw::query();
        $kontakRt = KontakRt::with('rt.rw');

        // Filter berdasarkan kelurahan
        if ($request->filled('kelurahan')) {
            $kontakRw->where('nama_kelurahan', 'LIKE', '%' . $request->kelurahan . '%');
            $kontakRt->whereHas('rt.rw.kontak', function($query) use ($request) {
                $query->where('nama_kelurahan', 'LIKE', '%' . $request->kelurahan . '%');
            });
        }

        // Filter berdasarkan RW
        if ($request->filled('rw')) {
            $kontakRw->where('nama_rw', 'LIKE', '%' . $request->rw . '%');
            $kontakRt->whereHas('rt.rw.kontak', function($query) use ($request) {
                $query->where('nama_rw', 'LIKE', '%' . $request->rw . '%');
            });
        }

        $kontakRw = $kontakRw->get();
        $kontakRt = $kontakRt->get();
        
        return view('kecamatan.kontak.index', compact('kelurahan', 'rws', 'kontakRw', 'kontakRt'));
    }

    public function getRw($kelurahan)
    {
        if (isset($this->kelurahan[$kelurahan])) {
            return response()->json($this->kelurahan[$kelurahan]);
        }
        return response()->json([]);
    }
}