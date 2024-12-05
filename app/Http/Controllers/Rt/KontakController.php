<?php

namespace App\Http\Controllers\Rt;

use App\Http\Controllers\Controller;
use App\Models\KontakRt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = KontakRt::where('rt_id', Auth::guard('rt')->id())->first();
        return view('rt.kontak.index', compact('kontak'));
    }

    public function create()
    {
        // Cek apakah RT sudah memiliki kontak
        $kontak = KontakRt::where('rt_id', Auth::guard('rt')->id())->first();
        if ($kontak) {
            return redirect()->route('rt.kontak.index')->with('error', 'Anda sudah memiliki data kontak');
        }
        return view('rt.kontak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ketua' => 'required',
            'nomor_telepon' => 'required|numeric'
        ]);

        KontakRt::create([
            'nama_rt' => Auth::guard('rt')->user()->nama,
            'nama_ketua' => $request->nama_ketua,
            'nomor_telepon' => $request->nomor_telepon,
            'rt_id' => Auth::guard('rt')->id()
        ]);

        return redirect()->route('rt.kontak.index')->with('success', 'Data kontak berhasil ditambahkan');
    }

    public function edit()
    {
        $kontak = KontakRt::where('rt_id', Auth::guard('rt')->id())->firstOrFail();
        return view('rt.kontak.edit', compact('kontak'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_ketua' => 'required',
            'nomor_telepon' => 'required|numeric'
        ]);

        $kontak = KontakRt::where('rt_id', Auth::guard('rt')->id())->firstOrFail();
        $kontak->update([
            'nama_ketua' => $request->nama_ketua,
            'nomor_telepon' => $request->nomor_telepon
        ]);

        return redirect()->route('rt.kontak.index')->with('success', 'Data kontak berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kontak = KontakRt::where('rt_id', Auth::guard('rt')->id())
                          ->where('id', $id)
                          ->firstOrFail();
        
        $kontak->delete();

        return redirect()->route('rt.kontak.index')->with('success', 'Data kontak berhasil dihapus');
    }
}