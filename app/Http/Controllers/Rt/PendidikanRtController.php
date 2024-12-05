<?php

namespace App\Http\Controllers\Rt;

use App\Http\Controllers\Controller;
use App\Models\PendidikanRt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendidikanRtController extends Controller
{
    public function index()
    {
        $pendidikan = PendidikanRt::where('rt_id', Auth::guard('rt')->id())
                                 ->latest()
                                 ->paginate(10);
        return view('rt.pendidikan.index', compact('pendidikan'));
    }

    public function create()
    {
        return view('rt.pendidikan.create');
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
            'waktu_input' => 'required',
            'batas_utara' => 'required',
            'batas_selatan' => 'required',
            'batas_timur' => 'required',
            'batas_barat' => 'required',
            'luas_wilayah' => 'required|numeric',
            'sarana_pendidikan' => 'required|numeric',
            'sarana_olahraga' => 'required|numeric',
            'sarana_pariwisata' => 'required|numeric',
            'tanah_lapang' => 'required|numeric',
            'jumlah_penduduk' => 'required|numeric',
            'jumlah_laki' => 'required|numeric',
            'jumlah_perempuan' => 'required|numeric',
            'jumlah_kk' => 'required|numeric',
            'usia_0_4_l' => 'required|numeric',
            'usia_0_4_p' => 'required|numeric',
            'usia_5_9_l' => 'required|numeric',
            'usia_5_9_p' => 'required|numeric',
            'usia_10_14_l' => 'required|numeric',
            'usia_10_14_p' => 'required|numeric',
            'usia_15_19_l' => 'required|numeric',
            'usia_15_19_p' => 'required|numeric',
            'usia_20_24_l' => 'required|numeric',
            'usia_20_24_p' => 'required|numeric',
            'usia_25_29_l' => 'required|numeric',
            'usia_25_29_p' => 'required|numeric',
            'usia_30_34_l' => 'required|numeric',
            'usia_30_34_p' => 'required|numeric',
            'usia_35_39_l' => 'required|numeric',
            'usia_35_39_p' => 'required|numeric',
            'usia_40_44_l' => 'required|numeric',
            'usia_40_44_p' => 'required|numeric',
            'usia_45_49_l' => 'required|numeric',
            'usia_45_49_p' => 'required|numeric',
            'usia_50_54_l' => 'required|numeric',
            'usia_50_54_p' => 'required|numeric',
            'usia_55_59_l' => 'required|numeric',
            'usia_55_59_p' => 'required|numeric',
            'usia_60_64_l' => 'required|numeric',
            'usia_60_64_p' => 'required|numeric',
            'usia_65_69_l' => 'required|numeric',
            'usia_65_69_p' => 'required|numeric',
            'usia_70_74_l' => 'required|numeric',
            'usia_70_74_p' => 'required|numeric',
            'usia_75_plus_l' => 'required|numeric',
            'usia_75_plus_p' => 'required|numeric'
        ]);

        $data = $request->all();
        $data['rt_id'] = Auth::guard('rt')->id();
        
        $data['jumlah_total'] = $data['jumlah_laki'] + $data['jumlah_perempuan'];
        $data['kepadatan_penduduk'] = $data['jumlah_total'] / $data['luas_wilayah'];
        
        $data['jumlah_laki_usia'] = 
            $data['usia_0_4_l'] + 
            $data['usia_5_9_l'] + 
            $data['usia_10_14_l'] +
            $data['usia_15_19_l'] +
            $data['usia_20_24_l'] +
            $data['usia_25_29_l'] +
            $data['usia_30_34_l'] +
            $data['usia_35_39_l'] +
            $data['usia_40_44_l'] +
            $data['usia_45_49_l'] +
            $data['usia_50_54_l'] +
            $data['usia_55_59_l'] +
            $data['usia_60_64_l'] +
            $data['usia_65_69_l'] +
            $data['usia_70_74_l'] +
            $data['usia_75_plus_l'];

        $data['jumlah_perempuan_usia'] = 
            $data['usia_0_4_p'] + 
            $data['usia_5_9_p'] + 
            $data['usia_10_14_p'] +
            $data['usia_15_19_p'] +
            $data['usia_20_24_p'] +
            $data['usia_25_29_p'] +
            $data['usia_30_34_p'] +
            $data['usia_35_39_p'] +
            $data['usia_40_44_p'] +
            $data['usia_45_49_p'] +
            $data['usia_50_54_p'] +
            $data['usia_55_59_p'] +
            $data['usia_60_64_p'] +
            $data['usia_65_69_p'] +
            $data['usia_70_74_p'] +
            $data['usia_75_plus_p'];

        $data['jumlah_penduduk_usia'] = $data['jumlah_laki_usia'] + $data['jumlah_perempuan_usia'];
        
        $data['total_laki_pekerjaan'] = $data['petani_l'] + $data['buruh_tani_l'] + $data['pns_l'] +
                                        $data['pengrajin_l'] + $data['pedagang_l'] + $data['peternak_l'] +
                                        $data['dokter_swasta_l'] + $data['bidan_swasta_l'] +
                                        $data['tni_polri_l'] + $data['pensiunan_tni_polri_l'] +
                                        $data['pensiunan_pns_l'];

        $data['total_perempuan_pekerjaan'] = $data['petani_p'] + $data['buruh_tani_p'] + $data['pns_p'] +
                                             $data['pengrajin_p'] + $data['pedagang_p'] + $data['peternak_p'] +
                                             $data['dokter_swasta_p'] + $data['bidan_swasta_p'] +
                                             $data['tni_polri_p'] + $data['pensiunan_tni_polri_p'] +
                                             $data['pensiunan_pns_p'];

        // Konversi data PAUD menjadi JSON sebelum disimpan
        if ($request->has('nama_paud')) {
            $paudData = [];
            foreach ($request->nama_paud as $key => $nama) {
                if (!empty($nama)) {
                    $paudData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_paud[$key],
                        'jumlah_siswa' => (int)$request->jumlah_siswa_paud[$key],
                        'jumlah_pengajar' => (int)$request->jumlah_pengajar_paud[$key]
                    ];
                }
            }
            $data['nama_paud'] = json_encode($paudData);
        }

        // Proses data TK
        if ($request->has('nama_tk')) {
            $tkData = [];
            foreach ($request->nama_tk as $key => $nama) {
                if (!empty($nama)) {
                    $tkData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_tk[$key] ?? '',
                        'jumlah_siswa' => (int)($request->jumlah_siswa_tk[$key] ?? 0),
                        'jumlah_guru' => (int)($request->jumlah_guru_tk[$key] ?? 0)
                    ];
                }
            }
            $data['data_tk'] = !empty($tkData) ? json_encode($tkData) : null;
        }

        // Proses data SD
        if ($request->has('nama_sd')) {
            $sdData = [];
            foreach ($request->nama_sd as $key => $nama) {
                if (!empty($nama)) {
                    $sdData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_sd[$key],
                        'jumlah_siswa' => (int)$request->jumlah_siswa_sd[$key],
                        'jumlah_guru' => (int)$request->jumlah_guru_sd[$key]
                    ];
                }
            }
            $data['data_sd'] = json_encode($sdData);
        }

        // Proses data SMP
        if ($request->has('nama_smp')) {
            $smpData = [];
            foreach ($request->nama_smp as $key => $nama) {
                if (!empty($nama)) {
                    $smpData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_smp[$key],
                        'jumlah_siswa' => (int)$request->jumlah_siswa_smp[$key],
                        'jumlah_guru' => (int)$request->jumlah_guru_smp[$key]
                    ];
                }
            }
            $data['data_smp'] = json_encode($smpData);
        }

        // Proses data SMA/MA/SMK (Tabel N)
        if ($request->has('nama_sma')) {
            $smaData = [];
            foreach ($request->nama_sma as $key => $nama) {
                if (!empty($nama)) {
                    $smaData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_sma[$key],
                        'jumlah_siswa' => (int)$request->jumlah_siswa_sma[$key],
                        'jumlah_guru' => (int)$request->jumlah_guru_sma[$key]
                    ];
                }
            }
            $data['data_sma'] = !empty($smaData) ? json_encode($smaData) : null;
        }

        // Proses data Perguruan Tinggi (Tabel O)
        if ($request->has('nama_pt')) {
            $ptData = [];
            foreach ($request->nama_pt as $key => $nama) {
                if (!empty($nama)) {
                    $ptData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_pt[$key],
                        'jumlah_mahasiswa' => (int)$request->jumlah_mahasiswa_pt[$key],
                        'jumlah_dosen' => (int)$request->jumlah_dosen_pt[$key]
                    ];
                }
            }
            $data['data_pt'] = !empty($ptData) ? json_encode($ptData) : null;
        }

        // Proses data Pendidikan Khusus (Tabel P)
        if ($request->has('nama_pendidikan_khusus')) {
            $pendidikanKhususData = [];
            foreach ($request->nama_pendidikan_khusus as $key => $nama) {
                if (!empty($nama)) {
                    $pendidikanKhususData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_pendidikan_khusus[$key],
                        'jumlah_siswa' => (int)$request->jumlah_siswa_pendidikan_khusus[$key],
                        'jumlah_guru' => (int)$request->jumlah_guru_pendidikan_khusus[$key]
                    ];
                }
            }
            $data['data_pendidikan_khusus'] = !empty($pendidikanKhususData) ? json_encode($pendidikanKhususData) : null;
        }

        // Proses data Pendidikan Non Formal (Tabel Q)
        if ($request->has('nama_pendidikan_non_formal')) {
            $pendidikanNonFormalData = [];
            foreach ($request->nama_pendidikan_non_formal as $key => $nama) {
                if (!empty($nama)) {
                    $pendidikanNonFormalData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_pendidikan_non_formal[$key],
                        'jumlah_peserta' => (int)$request->jumlah_peserta_non_formal[$key],
                        'jumlah_pengajar' => (int)$request->jumlah_pengajar_non_formal[$key]
                    ];
                }
            }
            $data['data_pendidikan_non_formal'] = !empty($pendidikanNonFormalData) ? json_encode($pendidikanNonFormalData) : null;
        }

        PendidikanRt::create($data);

        return redirect()->route('rt.pendidikan.index')
            ->with('success', 'Data pendidikan berhasil ditambahkan');
    }

    public function show($id)
    {
        $pendidikan = PendidikanRt::where('rt_id', Auth::guard('rt')->id())
                                 ->findOrFail($id);

        // Hitung total cacat fisik
        $pendidikan->total_cacat_fisik_laki = 
            $pendidikan->tuna_rungu_l + 
            $pendidikan->tuna_wicara_l + 
            $pendidikan->tuna_netra_l + 
            $pendidikan->lumpuh_l + 
            $pendidikan->sumbing_l;

        $pendidikan->total_cacat_fisik_perempuan = 
            $pendidikan->tuna_rungu_p + 
            $pendidikan->tuna_wicara_p + 
            $pendidikan->tuna_netra_p + 
            $pendidikan->lumpuh_p + 
            $pendidikan->sumbing_p;

        // Hitung total cacat mental
        $pendidikan->total_cacat_mental_laki = 
            $pendidikan->idiot_l + 
            $pendidikan->gila_l + 
            $pendidikan->stress_l + 
            $pendidikan->autis_l;

        $pendidikan->total_cacat_mental_perempuan = 
            $pendidikan->idiot_p + 
            $pendidikan->gila_p + 
            $pendidikan->stress_p + 
            $pendidikan->autis_p;

        // Hitung total untuk setiap jenjang pendidikan
        $pendidikan->total_siswa_tk = collect($pendidikan->data_tk ?? [])->sum('jumlah_siswa');
        $pendidikan->total_guru_tk = collect($pendidikan->data_tk ?? [])->sum('jumlah_guru');
        
        $pendidikan->total_siswa_sd = collect($pendidikan->data_sd ?? [])->sum('jumlah_siswa');
        $pendidikan->total_guru_sd = collect($pendidikan->data_sd ?? [])->sum('jumlah_guru');
        
        $pendidikan->total_siswa_smp = collect($pendidikan->data_smp ?? [])->sum('jumlah_siswa');
        $pendidikan->total_guru_smp = collect($pendidikan->data_smp ?? [])->sum('jumlah_guru');

        // Hitung total untuk setiap jenjang pendidikan tambahan
        $pendidikan->total_siswa_sma = collect($pendidikan->data_sma ?? [])->sum('jumlah_siswa');
        $pendidikan->total_guru_sma = collect($pendidikan->data_sma ?? [])->sum('jumlah_guru');
        
        $pendidikan->total_mahasiswa_pt = collect($pendidikan->data_pt ?? [])->sum('jumlah_mahasiswa');
        $pendidikan->total_dosen_pt = collect($pendidikan->data_pt ?? [])->sum('jumlah_dosen');
        
        $pendidikan->total_siswa_pendidikan_khusus = collect($pendidikan->data_pendidikan_khusus ?? [])->sum('jumlah_siswa');
        $pendidikan->total_guru_pendidikan_khusus = collect($pendidikan->data_pendidikan_khusus ?? [])->sum('jumlah_guru');
        
        $pendidikan->total_peserta_non_formal = collect($pendidikan->data_pendidikan_non_formal ?? [])->sum('jumlah_peserta');
        $pendidikan->total_pengajar_non_formal = collect($pendidikan->data_pendidikan_non_formal ?? [])->sum('jumlah_pengajar');

        return view('rt.pendidikan.show', compact('pendidikan'));
    }

    public function edit($id)
    {
        $pendidikan = PendidikanRt::where('rt_id', Auth::guard('rt')->id())
                                 ->findOrFail($id);
        return view('rt.pendidikan.edit', compact('pendidikan'));
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
            'waktu_input' => 'required',
            'batas_utara' => 'required',
            'batas_selatan' => 'required',
            'batas_timur' => 'required',
            'batas_barat' => 'required',
            'luas_wilayah' => 'required|numeric',
            'sarana_pendidikan' => 'required|numeric',
            'sarana_olahraga' => 'required|numeric',
            'sarana_pariwisata' => 'required|numeric',
            'tanah_lapang' => 'required|numeric',
            'jumlah_laki' => 'required|numeric',
            'jumlah_perempuan' => 'required|numeric',
            'jumlah_kk' => 'required|numeric',
            'usia_0_4_l' => 'required|numeric',
            'usia_0_4_p' => 'required|numeric',
            'usia_5_9_l' => 'required|numeric',
            'usia_5_9_p' => 'required|numeric',
            'usia_10_14_l' => 'required|numeric',
            'usia_10_14_p' => 'required|numeric',
            'usia_15_19_l' => 'required|numeric',
            'usia_15_19_p' => 'required|numeric',
            'usia_20_24_l' => 'required|numeric',
            'usia_20_24_p' => 'required|numeric',
            'usia_25_29_l' => 'required|numeric',
            'usia_25_29_p' => 'required|numeric',
            'usia_30_34_l' => 'required|numeric',
            'usia_30_34_p' => 'required|numeric',
            'usia_35_39_l' => 'required|numeric',
            'usia_35_39_p' => 'required|numeric',
            'usia_40_44_l' => 'required|numeric',
            'usia_40_44_p' => 'required|numeric',
            'usia_45_49_l' => 'required|numeric',
            'usia_45_49_p' => 'required|numeric',
            'usia_50_54_l' => 'required|numeric',
            'usia_50_54_p' => 'required|numeric',
            'usia_55_59_l' => 'required|numeric',
            'usia_55_59_p' => 'required|numeric',
            'usia_60_64_l' => 'required|numeric',
            'usia_60_64_p' => 'required|numeric',
            'usia_65_69_l' => 'required|numeric',
            'usia_65_69_p' => 'required|numeric',
            'usia_70_74_l' => 'required|numeric',
            'usia_70_74_p' => 'required|numeric',
            'usia_75_plus_l' => 'required|numeric',
            'usia_75_plus_p' => 'required|numeric',

            // Mata Pencaharian
            'petani_l' => 'required|numeric',
            'petani_p' => 'required|numeric',
            'buruh_tani_l' => 'required|numeric',
            'buruh_tani_p' => 'required|numeric',
            'pns_l' => 'required|numeric',
            'pns_p' => 'required|numeric',
            'pengrajin_l' => 'required|numeric',
            'pengrajin_p' => 'required|numeric',
            'pedagang_l' => 'required|numeric',
            'pedagang_p' => 'required|numeric',
            'peternak_l' => 'required|numeric',
            'peternak_p' => 'required|numeric',
            'dokter_swasta_l' => 'required|numeric',
            'dokter_swasta_p' => 'required|numeric',
            'bidan_swasta_l' => 'required|numeric',
            'bidan_swasta_p' => 'required|numeric',
            'tni_polri_l' => 'required|numeric',
            'tni_polri_p' => 'required|numeric',
            'pensiunan_tni_polri_l' => 'required|numeric',
            'pensiunan_tni_polri_p' => 'required|numeric',
            'pensiunan_pns_l' => 'required|numeric',
            'pensiunan_pns_p' => 'required|numeric',

            // Agama
            'islam_l' => 'required|numeric',
            'islam_p' => 'required|numeric',
            'kristen_l' => 'required|numeric',
            'kristen_p' => 'required|numeric',
            'katholik_l' => 'required|numeric',
            'katholik_p' => 'required|numeric',
            'hindu_l' => 'required|numeric',
            'hindu_p' => 'required|numeric',
            'budha_l' => 'required|numeric',
            'budha_p' => 'required|numeric',
            'khonghucu_l' => 'required|numeric',
            'khonghucu_p' => 'required|numeric',

            // Kewarganegaraan
            'wni_l' => 'required|numeric',
            'wni_p' => 'required|numeric',
            'wna_l' => 'required|numeric',
            'wna_p' => 'required|numeric',


            // Tabel H, I, J
            'penduduk_usia_18_56_l' => 'required|numeric',
            'penduduk_usia_18_56_p' => 'required|numeric',
            'penduduk_usia_18_58_bekerja_l' => 'required|numeric',
            'penduduk_usia_18_58_bekerja_p' => 'required|numeric',
            'penduduk_usia_18_58_tidak_bekerja_l' => 'required|numeric',
            'penduduk_usia_18_58_tidak_bekerja_p' => 'required|numeric',
            'penduduk_usia_58_keatas_l' => 'required|numeric',
            'penduduk_usia_58_keatas_p' => 'required|numeric',
            'penduduk_usia_58_keatas_bekerja_l' => 'required|numeric',
            'penduduk_usia_58_keatas_bekerja_p' => 'required|numeric',
            'penduduk_usia_58_keatas_tidak_bekerja_l' => 'required|numeric',
            'penduduk_usia_58_keatas_tidak_bekerja_p' => 'required|numeric',

            // Validasi untuk Cacat Fisik
            'tuna_rungu_l' => 'required|numeric',
            'tuna_rungu_p' => 'required|numeric',
            'tuna_wicara_l' => 'required|numeric',
            'tuna_wicara_p' => 'required|numeric',
            'tuna_netra_l' => 'required|numeric',
            'tuna_netra_p' => 'required|numeric',
            'lumpuh_l' => 'required|numeric',
            'lumpuh_p' => 'required|numeric',
            'sumbing_l' => 'required|numeric',
            'sumbing_p' => 'required|numeric',

            // Validasi untuk Cacat Mental
            'idiot_l' => 'required|numeric',
            'idiot_p' => 'required|numeric',
            'gila_l' => 'required|numeric',
            'gila_p' => 'required|numeric',
            'stress_l' => 'required|numeric',
            'stress_p' => 'required|numeric',
            'autis_l' => 'required|numeric',
            'autis_p' => 'required|numeric',
        ]);

        $pendidikan = PendidikanRt::where('rt_id', Auth::guard('rt')->id())
                                 ->findOrFail($id);

        $data = $request->all();
        
        $data['jumlah_total'] = $data['jumlah_laki'] + $data['jumlah_perempuan'];
        $data['kepadatan_penduduk'] = $data['jumlah_total'] / $data['luas_wilayah'];
        
        $data['jumlah_laki_usia'] = 
            $data['usia_0_4_l'] + 
            $data['usia_5_9_l'] + 
            $data['usia_10_14_l'] +
            $data['usia_15_19_l'] +
            $data['usia_20_24_l'] +
            $data['usia_25_29_l'] +
            $data['usia_30_34_l'] +
            $data['usia_35_39_l'] +
            $data['usia_40_44_l'] +
            $data['usia_45_49_l'] +
            $data['usia_50_54_l'] +
            $data['usia_55_59_l'] +
            $data['usia_60_64_l'] +
            $data['usia_65_69_l'] +
            $data['usia_70_74_l'] +
            $data['usia_75_plus_l'];

        $data['jumlah_perempuan_usia'] = 
            $data['usia_0_4_p'] + 
            $data['usia_5_9_p'] + 
            $data['usia_10_14_p'] +
            $data['usia_15_19_p'] +
            $data['usia_20_24_p'] +
            $data['usia_25_29_p'] +
            $data['usia_30_34_p'] +
            $data['usia_35_39_p'] +
            $data['usia_40_44_p'] +
            $data['usia_45_49_p'] +
            $data['usia_50_54_p'] +
            $data['usia_55_59_p'] +
            $data['usia_60_64_p'] +
            $data['usia_65_69_p'] +
            $data['usia_70_74_p'] +
            $data['usia_75_plus_p'];

        $data['jumlah_penduduk_usia'] = $data['jumlah_laki_usia'] + $data['jumlah_perempuan_usia'];
        
        $data['total_laki_pekerjaan'] = $data['petani_l'] + $data['buruh_tani_l'] + $data['pns_l'] +
                                        $data['pengrajin_l'] + $data['pedagang_l'] + $data['peternak_l'] +
                                        $data['dokter_swasta_l'] + $data['bidan_swasta_l'] +
                                        $data['tni_polri_l'] + $data['pensiunan_tni_polri_l'] +
                                        $data['pensiunan_pns_l'];

        $data['total_perempuan_pekerjaan'] = $data['petani_p'] + $data['buruh_tani_p'] + $data['pns_p'] +
                                             $data['pengrajin_p'] + $data['pedagang_p'] + $data['peternak_p'] +
                                             $data['dokter_swasta_p'] + $data['bidan_swasta_p'] +
                                             $data['tni_polri_p'] + $data['pensiunan_tni_polri_p'] +
                                             $data['pensiunan_pns_p'];

        // Hitung total agama
        $data['total_laki_agama'] = 
            $data['islam_l'] +
            $data['kristen_l'] +
            $data['katholik_l'] +
            $data['hindu_l'] +
            $data['budha_l'] +
            $data['khonghucu_l'];

        $data['total_perempuan_agama'] = 
            $data['islam_p'] +
            $data['kristen_p'] +
            $data['katholik_p'] +
            $data['hindu_p'] +
            $data['budha_p'] +
            $data['khonghucu_p'];

        // Hitung total kewarganegaraan
        $data['total_laki_warga'] = $data['wni_l'] + $data['wna_l'];
        $data['total_perempuan_warga'] = $data['wni_p'] + $data['wna_p'];

        // Konversi data PAUD menjadi JSON sebelum diupdate
        if ($request->has('nama_paud')) {
            $paudData = [];
            foreach ($request->nama_paud as $key => $nama) {
                $paudData[] = [
                    'nama' => $nama,
                    'alamat' => $request->alamat_paud[$key],
                    'jumlah_siswa' => $request->jumlah_siswa_paud[$key],
                    'jumlah_pengajar' => $request->jumlah_pengajar_paud[$key]
                ];
            }
            $data['nama_paud'] = json_encode($paudData);
        }

        // Proses data TK
        if ($request->has('nama_tk')) {
            $tkData = [];
            foreach ($request->nama_tk as $key => $nama) {
                if (!empty($nama)) {
                    $tkData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_tk[$key] ?? '',
                        'jumlah_siswa' => (int)($request->jumlah_siswa_tk[$key] ?? 0),
                        'jumlah_guru' => (int)($request->jumlah_guru_tk[$key] ?? 0)
                    ];
                }
            }
            $data['data_tk'] = !empty($tkData) ? json_encode($tkData) : null;
        }

        // Proses data SD
        if ($request->has('nama_sd')) {
            $sdData = [];
            foreach ($request->nama_sd as $key => $nama) {
                if (!empty($nama)) {
                    $sdData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_sd[$key],
                        'jumlah_siswa' => (int)$request->jumlah_siswa_sd[$key],
                        'jumlah_guru' => (int)$request->jumlah_guru_sd[$key]
                    ];
                }
            }
            $data['data_sd'] = json_encode($sdData);
        }

        // Proses data SMP
        if ($request->has('nama_smp')) {
            $smpData = [];
            foreach ($request->nama_smp as $key => $nama) {
                if (!empty($nama)) {
                    $smpData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_smp[$key],
                        'jumlah_siswa' => (int)$request->jumlah_siswa_smp[$key],
                        'jumlah_guru' => (int)$request->jumlah_guru_smp[$key]
                    ];
                }
            }
            $data['data_smp'] = json_encode($smpData);
        }

        // Proses data SMA/MA/SMK (Tabel N)
        if ($request->has('nama_sma')) {
            $smaData = [];
            foreach ($request->nama_sma as $key => $nama) {
                if (!empty($nama)) {
                    $smaData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_sma[$key],
                        'jumlah_siswa' => (int)$request->jumlah_siswa_sma[$key],
                        'jumlah_guru' => (int)$request->jumlah_guru_sma[$key]
                    ];
                }
            }
            $data['data_sma'] = !empty($smaData) ? json_encode($smaData) : null;
        }

        // Proses data Perguruan Tinggi (Tabel O)
        if ($request->has('nama_pt')) {
            $ptData = [];
            foreach ($request->nama_pt as $key => $nama) {
                if (!empty($nama)) {
                    $ptData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_pt[$key],
                        'jumlah_mahasiswa' => (int)$request->jumlah_mahasiswa_pt[$key],
                        'jumlah_dosen' => (int)$request->jumlah_dosen_pt[$key]
                    ];
                }
            }
            $data['data_pt'] = !empty($ptData) ? json_encode($ptData) : null;
        }

        // Proses data Pendidikan Khusus (Tabel P)
        if ($request->has('nama_pendidikan_khusus')) {
            $pendidikanKhususData = [];
            foreach ($request->nama_pendidikan_khusus as $key => $nama) {
                if (!empty($nama)) {
                    $pendidikanKhususData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_pendidikan_khusus[$key],
                        'jumlah_siswa' => (int)$request->jumlah_siswa_pendidikan_khusus[$key],
                        'jumlah_guru' => (int)$request->jumlah_guru_pendidikan_khusus[$key]
                    ];
                }
            }
            $data['data_pendidikan_khusus'] = !empty($pendidikanKhususData) ? json_encode($pendidikanKhususData) : null;
        }

        // Proses data Pendidikan Non Formal (Tabel Q)
        if ($request->has('nama_pendidikan_non_formal')) {
            $pendidikanNonFormalData = [];
            foreach ($request->nama_pendidikan_non_formal as $key => $nama) {
                if (!empty($nama)) {
                    $pendidikanNonFormalData[] = [
                        'nama' => $nama,
                        'alamat' => $request->alamat_pendidikan_non_formal[$key],
                        'jumlah_peserta' => (int)$request->jumlah_peserta_non_formal[$key],
                        'jumlah_pengajar' => (int)$request->jumlah_pengajar_non_formal[$key]
                    ];
                }
            }
            $data['data_pendidikan_non_formal'] = !empty($pendidikanNonFormalData) ? json_encode($pendidikanNonFormalData) : null;
        }

        // Update data
        $pendidikan->update($data);

        return redirect()->route('rt.pendidikan.index')
            ->with('success', 'Data pendidikan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pendidikan = PendidikanRt::where('rt_id', Auth::guard('rt')->id())
                                 ->findOrFail($id);
        $pendidikan->delete();

        return redirect()->route('rt.pendidikan.index')
            ->with('success', 'Data pendidikan berhasil dihapus');
    }
}