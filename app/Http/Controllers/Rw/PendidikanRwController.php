<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\PendidikanRw;
use App\Models\PendidikanRt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendidikanRwController extends Controller
{
    public function index()
    {
        $pendidikan = PendidikanRw::where('rw_id', Auth::guard('rw')->id())->get();
        return view('rw.pendidikan.index', compact('pendidikan'));
    }

    public function create()
    {
        return view('rw.pendidikan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'periode' => 'required',
            'tahun' => 'required|numeric',
            'nama_pengisi' => 'required',
            'pekerjaan' => 'required',
            'jabatan' => 'required',
            'tanggal_input' => 'required|date',
            'waktu_input' => 'required'
        ]);

        PendidikanRw::create([
            'no_surat' => $request->no_surat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'periode' => $request->periode,
            'tahun' => $request->tahun,
            'nama_pengisi' => $request->nama_pengisi,
            'pekerjaan' => $request->pekerjaan,
            'jabatan' => $request->jabatan,
            'tanggal_input' => $request->tanggal_input,
            'waktu_input' => $request->waktu_input,
            'rw_id' => Auth::guard('rw')->id()
        ]);

        return redirect()->route('rw.pendidikan.index')
            ->with('success', 'Data pendidikan berhasil ditambahkan');
    }

    public function show($id)
    {
        $pendidikan = PendidikanRw::where('rw_id', Auth::guard('rw')->id())
                                 ->findOrFail($id);
        return view('rw.pendidikan.show', compact('pendidikan'));
    }

    public function edit($id)
    {
        $pendidikan = PendidikanRw::where('rw_id', Auth::guard('rw')->id())
                                 ->findOrFail($id);
        return view('rw.pendidikan.edit', compact('pendidikan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_surat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'periode' => 'required',
            'tahun' => 'required|numeric',
            'nama_pengisi' => 'required',
            'pekerjaan' => 'required',
            'jabatan' => 'required',
            'tanggal_input' => 'required|date',
            'waktu_input' => 'required'
        ]);

        $pendidikan = PendidikanRw::where('rw_id', Auth::guard('rw')->id())
                                 ->findOrFail($id);

        $pendidikan->update([
            'no_surat' => $request->no_surat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'periode' => $request->periode,
            'tahun' => $request->tahun,
            'nama_pengisi' => $request->nama_pengisi,
            'pekerjaan' => $request->pekerjaan,
            'jabatan' => $request->jabatan,
            'tanggal_input' => $request->tanggal_input,
            'waktu_input' => $request->waktu_input
        ]);

        return redirect()->route('rw.pendidikan.index')
            ->with('success', 'Data pendidikan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pendidikan = PendidikanRw::where('rw_id', Auth::guard('rw')->id())
                                 ->findOrFail($id);
        
        $pendidikan->delete();

        return redirect()->route('rw.pendidikan.index')
            ->with('success', 'Data pendidikan berhasil dihapus');
    }

    public function indexRt()
    {
        $pendidikanRt = PendidikanRt::with('rt')
            ->whereHas('rt', function($query) {
                $query->where('rw_id', Auth::guard('rw')->id());
            })
            ->get();
        return view('rw.pendidikan.rt-index', compact('pendidikanRt'));
    }

    public function showRt($id)
    {
        $pendidikan = PendidikanRt::with('rt')
            ->whereHas('rt', function($query) {
                $query->where('rw_id', Auth::guard('rw')->id());
            })
            ->findOrFail($id);
        return view('rw.pendidikan.rt-show', compact('pendidikan'));
    }
}
