<?php

namespace App\Http\Controllers\Kecamatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendidikanRw;
use App\Models\PendidikanRt;
use App\Models\Rw;
use Auth;

class PendidikanKecamatanController extends Controller
{
    public function index()
    {
        $pendidikanRw = PendidikanRw::with(['rw' => function($query) {
                $query->where('kecamatan_id', Auth::guard('kecamatan')->id());
            }])
            ->whereHas('rw', function($query) {
                $query->where('kecamatan_id', Auth::guard('kecamatan')->id());
            })
            ->get();
            
        $pendidikanRt = PendidikanRt::with(['rt.rw' => function($query) {
                $query->where('kecamatan_id', Auth::guard('kecamatan')->id());
            }])
            ->whereHas('rt.rw', function($query) {
                $query->where('kecamatan_id', Auth::guard('kecamatan')->id());
            })
            ->get();

        return view('kecamatan.pendidikan.index', compact('pendidikanRw', 'pendidikanRt'));
    }

    public function show($id)
    {
        $pendidikan = PendidikanRw::with(['rw' => function($query) {
                $query->where('kecamatan_id', Auth::guard('kecamatan')->id());
            }])
            ->whereHas('rw', function($query) {
                $query->where('kecamatan_id', Auth::guard('kecamatan')->id());
            })
            ->findOrFail($id);
            
        return view('kecamatan.pendidikan.show', compact('pendidikan'));
    }
}
