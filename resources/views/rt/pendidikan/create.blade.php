@extends('rt.layout')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-plus-circle fa-fw"></i> Tambah Data Pendidikan
            </h1>
            <div class="text-gray-600 mt-1">
                DALAM RANGKA PENCAIRAN DANA INSENTIF RT
            </div>
        </div>
        <a href="{{ route('rt.pendidikan.index') }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-edit"></i> Form Input Data
            </h6>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="formWizard" action="{{ route('rt.pendidikan.store') }}" method="POST">
                @csrf
                <!-- Step 1: Data Umum -->
                <div class="step-content" id="step1">
                    <input type="hidden" name="kecamatan" value="Kesambi">
                    <input type="hidden" name="kota" value="Cirebon">
                    <input type="hidden" name="provinsi" value="Jawa Barat">

                    <div class="form-group">
                        <label class="font-weight-bold">Nomor Surat</label>
                        <input type="text" class="form-control @error('no_surat') is-invalid @enderror" 
                               name="no_surat" value="{{ old('no_surat') }}" required>
                        @error('no_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Periode</label>
                        <select class="form-control @error('periode') is-invalid @enderror" name="periode" required>
                            <option value="">Pilih Periode</option>
                            <option value="Triwulan 1">Triwulan 1 (Januari-Maret)</option>
                            <option value="Triwulan 2">Triwulan 2 (April-Juni)</option>
                            <option value="Triwulan 3">Triwulan 3 (Juli-September)</option>
                            <option value="Triwulan 4">Triwulan 4 (Oktober-Desember)</option>
                        </select>
                        @error('periode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Tahun</label>
                        <input type="number" class="form-control @error('tahun') is-invalid @enderror" 
                               name="tahun" value="{{ old('tahun', date('Y')) }}" required>
                        @error('tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Kelurahan</label>
                        <select class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" required>
                            <option value="">Pilih Kelurahan</option>
                            <option value="Kesambi">Kelurahan Kesambi</option>
                            <option value="Drajat">Kelurahan Drajat</option>
                            <option value="Pekiringan">Kelurahan Pekiringan</option>
                            <option value="Sunyaragi">Kelurahan Sunyaragi</option>
                            <option value="Karyamulya">Kelurahan Karyamulya</option>
                        </select>
                        @error('kelurahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Nama Pengisi</label>
                        <input type="text" class="form-control @error('nama_pengisi') is-invalid @enderror" 
                               name="nama_pengisi" value="{{ old('nama_pengisi') }}" required>
                        @error('nama_pengisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Pekerjaan</label>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" 
                               name="pekerjaan" value="{{ old('pekerjaan') }}" required>
                        @error('pekerjaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" 
                               name="jabatan" value="{{ old('jabatan') }}" required>
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal Input</label>
                        <input type="date" class="form-control @error('tanggal_input') is-invalid @enderror" 
                               name="tanggal_input" value="{{ old('tanggal_input', date('Y-m-d')) }}" required>
                        @error('tanggal_input')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Waktu Input</label>
                        <input type="time" class="form-control @error('waktu_input') is-invalid @enderror" 
                               name="waktu_input" value="{{ old('waktu_input', date('H:i')) }}" required>
                        @error('waktu_input')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                                <!-- Step 2: Kondisi Geografis -->
                                <div class="step-content d-none" id="step2">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-map-marked-alt"></i> A. Kondisi Geografis
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Batas Utara</label>
                                        <input type="text" name="batas_utara" class="form-control" value="{{ old('batas_utara') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Batas Selatan</label>
                                        <input type="text" name="batas_selatan" class="form-control" value="{{ old('batas_selatan') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Batas Timur</label>
                                        <input type="text" name="batas_timur" class="form-control" value="{{ old('batas_timur') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Batas Barat</label>
                                        <input type="text" name="batas_barat" class="form-control" value="{{ old('batas_barat') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Luas Wilayah (Ha)</label>
                                        <input type="number" step="0.01" name="luas_wilayah" class="form-control" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Sarana Pendidikan (%)</label>
                                        <input type="number" step="0.01" name="sarana_pendidikan" class="form-control" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Sarana Olahraga (%)</label>
                                        <input type="number" step="0.01" name="sarana_olahraga" class="form-control" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Sarana Pariwisata (%)</label>
                                        <input type="number" step="0.01" name="sarana_pariwisata" class="form-control" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanah Lapang (%)</label>
                                        <input type="number" step="0.01" name="tanah_lapang" class="form-control" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Kondisi Demografi -->
                <div class="step-content d-none" id="step3">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-users"></i> B. Kondisi Demografi
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah Laki-laki</label>
                                <div class="col-sm-9">
                                    <input type="number" name="jumlah_laki" id="jumlah_laki" 
                                           class="form-control" value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah Perempuan</label>
                                <div class="col-sm-9">
                                    <input type="number" name="jumlah_perempuan" id="jumlah_perempuan" 
                                           class="form-control" value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah KK</label>
                                <div class="col-sm-9">
                                    <input type="number" name="jumlah_kk" id="jumlah_kk" 
                                           class="form-control" value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Penduduk</label>
                                <div class="col-sm-9">
                                    <input type="number" name="jumlah_penduduk" id="jumlah_penduduk" 
                                           class="form-control" value="0" readonly>
                                    <small class="text-muted">Total akan dihitung otomatis dari jumlah laki-laki + perempuan</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Potensi SDM -->
                <div class="step-content d-none" id="step4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-chart-pie"></i> C. Potensi SDM
                            </h6>
                            <small class="text-muted">Data ini otomatis terisi dari data Kondisi Demografi</small>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Laki-laki</label>
                                <div class="col-sm-9">
                                    <input type="number" name="sdm_laki" id="sdm_laki" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Perempuan</label>
                                <div class="col-sm-9">
                                    <input type="number" name="sdm_perempuan" id="sdm_perempuan" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total KK</label>
                                <div class="col-sm-9">
                                    <input type="number" name="sdm_kk" id="sdm_kk" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Penduduk</label>
                                <div class="col-sm-9">
                                    <input type="number" name="sdm_total" id="sdm_total" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Data Usia -->
                <div class="step-content d-none" id="step5">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-user-friends"></i> D. Data Usia
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kelompok Usia</th>
                                            <th>Laki-laki</th>
                                            <th>Perempuan</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>0-4 Tahun</td>
                                            <td><input type="number" name="usia_0_4_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_0_4_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>5-9 Tahun</td>
                                            <td><input type="number" name="usia_5_9_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_5_9_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>10-14 Tahun</td>
                                            <td><input type="number" name="usia_10_14_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_10_14_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>15-19 Tahun</td>
                                            <td><input type="number" name="usia_15_19_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_15_19_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>20-24 Tahun</td>
                                            <td><input type="number" name="usia_20_24_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_20_24_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>25-29 Tahun</td>
                                            <td><input type="number" name="usia_25_29_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_25_29_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>30-34 Tahun</td>
                                            <td><input type="number" name="usia_30_34_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_30_34_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>35-39 Tahun</td>
                                            <td><input type="number" name="usia_35_39_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_35_39_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>40-44 Tahun</td>
                                            <td><input type="number" name="usia_40_44_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_40_44_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>45-49 Tahun</td>
                                            <td><input type="number" name="usia_45_49_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_45_49_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>50-54 Tahun</td>
                                            <td><input type="number" name="usia_50_54_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_50_54_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>55-59 Tahun</td>
                                            <td><input type="number" name="usia_55_59_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_55_59_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>60-64 Tahun</td>
                                            <td><input type="number" name="usia_60_64_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_60_64_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>65-69 Tahun</td>
                                            <td><input type="number" name="usia_65_69_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_65_69_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>70-74 Tahun</td>
                                            <td><input type="number" name="usia_70_74_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_70_74_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>75+ Tahun</td>
                                            <td><input type="number" name="usia_75_plus_l" class="form-control usia-input" value="0"></td>
                                            <td><input type="number" name="usia_75_plus_p" class="form-control usia-input" value="0"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td>Total</td>
                                            <td><span id="total_laki_usia">0</span></td>
                                            <td><span id="total_perempuan_usia">0</span></td>
                                            <td><span id="total_penduduk_usia">0</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 6: Mata Pencaharian -->
                <div class="step-content d-none" id="step6">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-briefcase"></i> E. Mata Pencaharian Pokok
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Jenis Pekerjaan</th>
                                            <th>Laki-laki (Orang)</th>
                                            <th>Perempuan (Orang)</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Petani</td>
                                            <td><input type="number" name="petani_l" class="form-control pekerjaan-input" value="0"></td>
                                            <td><input type="number" name="petani_p" class="form-control pekerjaan-input" value="0"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Buruh Tani</td>
                                            <td><input type="number" name="buruh_tani_l" class="form-control pekerjaan-input" value="0"></td>
                                            <td><input type="number" name="buruh_tani_p" class="form-control pekerjaan-input" value="0"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Pegawai Negeri Sipil</td>
                                            <td><input type="number" name="pns_l" class="form-control pekerjaan-input" value="0"></td>
                                            <td><input type="number" name="pns_p" class="form-control pekerjaan-input" value="0"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Pengrajin</td>
                                            <td><input type="number" name="pengrajin_l" class="form-control pekerjaan-input" value="0"></td>
                                            <td><input type="number" name="pengrajin_p" class="form-control pekerjaan-input" value="0"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Pedagang</td>
                                            <td><input type="number" name="pedagang_l" class="form-control pekerjaan-input" value="0"></td>
                                            <td><input type="number" name="pedagang_p" class="form-control pekerjaan-input" value="0"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Peternakan</td>
                                            <td><input type="number" name="peternak_l" class="form-control pekerjaan-input" value="0"></td>
                                            <td><input type="number" name="peternak_p" class="form-control pekerjaan-input" value="0"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter Swasta</td>
                                            <td><input type="number" name="dokter_swasta_l" class="form-control pekerjaan-input" value="0"></td>
                                            <td><input type="number" name="dokter_swasta_p" class="form-control pekerjaan-input" value="0"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Bidan Swasta</td>
                                            <td><input type="number" name="bidan_swasta_l" class="form-control pekerjaan-input" value="0"></td>
                                            <td><input type="number" name="bidan_swasta_p" class="form-control pekerjaan-input" value="0"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>TNI/POLRI</td>
                                            <td><input type="number" name="tni_polri_l" class="form-control pekerjaan-input" value="0"></td>
                                            <td><input type="number" name="tni_polri_p" class="form-control pekerjaan-input" value="0"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Pensiunan TNI/POLRI</td>
                                            <td><input type="number" name="pensiunan_tni_polri_l" class="form-control pekerjaan-input" value="0"></td>
                                            <td><input type="number" name="pensiunan_tni_polri_p" class="form-control pekerjaan-input" value="0"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Pensiunan PNS</td>
                                            <td><input type="number" name="pensiunan_pns_l" class="form-control pekerjaan-input" value="0"></td>
                                            <td><input type="number" name="pensiunan_pns_p" class="form-control pekerjaan-input" value="0"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td>Jumlah</td>
                                            <td><span id="total_laki_pekerjaan">0</span></td>
                                            <td><span id="total_perempuan_pekerjaan">0</span></td>
                                            <td><span id="total_pekerjaan">0</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 7: Agama -->
                <div class="step-content d-none" id="step7">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-pray"></i> F. Agama/Aliran Kepercayaan
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Agama</th>
                                            <th>Laki-laki (Orang)</th>
                                            <th>Perempuan (Orang)</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>ISLAM</td>
                                            <td><input type="number" name="islam_l" class="form-control agama-input" value="0"></td>
                                            <td><input type="number" name="islam_p" class="form-control agama-input" value="0"></td>
                                            <td><span class="total-per-agama">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>KRISTEN</td>
                                            <td><input type="number" name="kristen_l" class="form-control agama-input" value="0"></td>
                                            <td><input type="number" name="kristen_p" class="form-control agama-input" value="0"></td>
                                            <td><span class="total-per-agama">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>KATHOLIK</td>
                                            <td><input type="number" name="katholik_l" class="form-control agama-input" value="0"></td>
                                            <td><input type="number" name="katholik_p" class="form-control agama-input" value="0"></td>
                                            <td><span class="total-per-agama">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>HINDU</td>
                                            <td><input type="number" name="hindu_l" class="form-control agama-input" value="0"></td>
                                            <td><input type="number" name="hindu_p" class="form-control agama-input" value="0"></td>
                                            <td><span class="total-per-agama">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>BUDHA</td>
                                            <td><input type="number" name="budha_l" class="form-control agama-input" value="0"></td>
                                            <td><input type="number" name="budha_p" class="form-control agama-input" value="0"></td>
                                            <td><span class="total-per-agama">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>KONGHUCU</td>
                                            <td><input type="number" name="khonghucu_l" class="form-control agama-input" value="0"></td>
                                            <td><input type="number" name="khonghucu_p" class="form-control agama-input" value="0"></td>
                                            <td><span class="total-per-agama">0</span></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="2">JUMLAH</td>
                                            <td><span id="total_laki_agama">0</span></td>
                                            <td><span id="total_perempuan_agama">0</span></td>
                                            <td><span id="total_agama">0</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 8: Kewarganegaraan -->
                <div class="step-content d-none" id="step8">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-flag"></i> G. Kewarganegaraan
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Jenis Pekerjaan</th>
                                            <th>Laki-laki (Orang)</th>
                                            <th>Perempuan (Orang)</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Warga Negara Indonesia</td>
                                            <td><input type="number" name="wni_l" class="form-control warga-input" value="0"></td>
                                            <td><input type="number" name="wni_p" class="form-control warga-input" value="0"></td>
                                            <td><span class="total-per-warga">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Warga Negara Asing</td>
                                            <td><input type="number" name="wna_l" class="form-control warga-input" value="0"></td>
                                            <td><input type="number" name="wna_p" class="form-control warga-input" value="0"></td>
                                            <td><span class="total-per-warga">0</span></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="2">JUMLAH</td>
                                            <td><span id="total_laki_warga">0</span></td>
                                            <td><span id="total_perempuan_warga">0</span></td>
                                            <td><span id="total_warga">0</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 9: Data Cacat -->
                <div class="step-content d-none" id="step9">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-wheelchair"></i> H. Data Cacat Mental dan Fisik
                            </h6>
                        </div>
                        <div class="card-body">
                            <!-- Cacat Fisik -->
                            <h5 class="mb-3">1. Cacat Fisik</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="50">NO</th>
                                            <th>Jenis Cacat Fisik</th>
                                            <th>Laki-laki (Orang)</th>
                                            <th>Perempuan (Orang)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Tuna Rungu</td>
                                            <td><input type="number" name="tuna_rungu_l" class="form-control cacat-input" value="0"></td>
                                            <td><input type="number" name="tuna_rungu_p" class="form-control cacat-input" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Tuna Wicara</td>
                                            <td><input type="number" name="tuna_wicara_l" class="form-control cacat-input" value="0"></td>
                                            <td><input type="number" name="tuna_wicara_p" class="form-control cacat-input" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Tuna Netra</td>
                                            <td><input type="number" name="tuna_netra_l" class="form-control cacat-input" value="0"></td>
                                            <td><input type="number" name="tuna_netra_p" class="form-control cacat-input" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Lumpuh</td>
                                            <td><input type="number" name="lumpuh_l" class="form-control cacat-input" value="0"></td>
                                            <td><input type="number" name="lumpuh_p" class="form-control cacat-input" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Sumbing</td>
                                            <td><input type="number" name="sumbing_l" class="form-control cacat-input" value="0"></td>
                                            <td><input type="number" name="sumbing_p" class="form-control cacat-input" value="0"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="2">JUMLAH</td>
                                            <td><span id="total_laki_cacat_fisik">0</span></td>
                                            <td><span id="total_perempuan_cacat_fisik">0</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Cacat Mental -->
                            <h5 class="mb-3 mt-4">2. Cacat Mental</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="50">NO</th>
                                            <th>Jenis Cacat Mental</th>
                                            <th>Laki-laki (Orang)</th>
                                            <th>Perempuan (Orang)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Idiot</td>
                                            <td><input type="number" name="idiot_l" class="form-control cacat-mental-input" value="0"></td>
                                            <td><input type="number" name="idiot_p" class="form-control cacat-mental-input" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Gila</td>
                                            <td><input type="number" name="gila_l" class="form-control cacat-mental-input" value="0"></td>
                                            <td><input type="number" name="gila_p" class="form-control cacat-mental-input" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Stress</td>
                                            <td><input type="number" name="stress_l" class="form-control cacat-mental-input" value="0"></td>
                                            <td><input type="number" name="stress_p" class="form-control cacat-mental-input" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Autis</td>
                                            <td><input type="number" name="autis_l" class="form-control cacat-mental-input" value="0"></td>
                                            <td><input type="number" name="autis_p" class="form-control cacat-mental-input" value="0"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="2">JUMLAH</td>
                                            <td><span id="total_laki_cacat_mental">0</span></td>
                                            <td><span id="total_perempuan_cacat_mental">0</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- I. Tenaga Kerja -->
                <div class="step-content d-none" id="step10">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-users"></i> I. Tenaga Kerja
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="50">NO</th>
                                            <th>Tenaga Kerja</th>
                                            <th>Laki-laki (Orang)</th>
                                            <th>Perempuan (Orang)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Penduduk Usia 18 - 56 Tahun</td>
                                            <td><input type="number" name="penduduk_usia_18_56_l" class="form-control" value="0"></td>
                                            <td><input type="number" name="penduduk_usia_18_56_p" class="form-control" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>a. Penduduk usia 18 - 58 tahun yang bekerja</td>
                                            <td><input type="number" name="penduduk_usia_18_58_bekerja_l" class="form-control" value="0"></td>
                                            <td><input type="number" name="penduduk_usia_18_58_bekerja_p" class="form-control" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>b. Penduduk usia 18 - 58 tahun yang belum bekerja</td>
                                            <td><input type="number" name="penduduk_usia_18_58_tidak_bekerja_l" class="form-control" value="0"></td>
                                            <td><input type="number" name="penduduk_usia_18_58_tidak_bekerja_p" class="form-control" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Penduduk usia 58 tahun ke atas</td>
                                            <td><input type="number" name="penduduk_usia_58_keatas_l" class="form-control" value="0"></td>
                                            <td><input type="number" name="penduduk_usia_58_keatas_p" class="form-control" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>a. Penduduk usia 58 tahun ke atas yang bekerja</td>
                                            <td><input type="number" name="penduduk_usia_58_keatas_bekerja_l" class="form-control" value="0"></td>
                                            <td><input type="number" name="penduduk_usia_58_keatas_bekerja_p" class="form-control" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>b. Penduduk usia 58 tahun ke atas yang belum bekerja</td>
                                            <td><input type="number" name="penduduk_usia_58_keatas_tidak_bekerja_l" class="form-control" value="0"></td>
                                            <td><input type="number" name="penduduk_usia_58_keatas_tidak_bekerja_p" class="form-control" value="0"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- J. Jumlah PAUD -->
                <div class="step-content d-none" id="step11">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-school"></i> J. Jumlah PAUD
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="paud-table">
                                    <thead>
                                        <tr>
                                            <th width="50">NO</th>
                                            <th>Nama PAUD</th>
                                            <th>Alamat PAUD</th>
                                            <th>Peserta Didik PAUD</th>
                                            <th>Jumlah Guru PAUD</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" name="nama_paud[]" class="form-control" value="-"></td>
                                            <td><input type="text" name="alamat_paud[]" class="form-control" value="-"></td>
                                            <td><input type="number" name="jumlah_siswa_paud[]" class="form-control" value="0"></td>
                                            <td><input type="number" name="jumlah_pengajar_paud[]" class="form-control" value="0"></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-paud">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="3">JUMLAH</td>
                                            <td><span id="total_siswa_paud">0</span></td>
                                            <td><span id="total_guru_paud">0</span></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="button" id="add-paud" class="btn btn-primary mt-2">Tambah PAUD</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- K. Jumlah TK -->
                <div class="step-content d-none" id="step12">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-school"></i> K. Jumlah TK
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tk-table">
                                    <thead>
                                        <tr>
                                            <th width="50">NO</th>
                                            <th>Nama TK</th>
                                            <th>Alamat TK</th>
                                            <th>Peserta Didik TK</th>
                                            <th>Jumlah Guru TK</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" name="nama_tk[]" class="form-control" value="-"></td>
                                            <td><input type="text" name="alamat_tk[]" class="form-control" value="-"></td>
                                            <td><input type="number" name="jumlah_siswa_tk[]" class="form-control" value="0"></td>
                                            <td><input type="number" name="jumlah_guru_tk[]" class="form-control" value="0"></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-tk">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="3">JUMLAH</td>
                                            <td><span id="total_siswa_tk">0</span></td>
                                            <td><span id="total_guru_tk">0</span></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="button" id="add-tk" class="btn btn-primary mt-2">Tambah TK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- L. Jumlah SD -->
                <div class="step-content d-none" id="step13">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-school"></i> L. Jumlah SD
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="sd-table">
                                    <thead>
                                        <tr>
                                            <th width="50">NO</th>
                                            <th>Nama SD</th>
                                            <th>Alamat SD</th>
                                            <th>Peserta Didik SD</th>
                                            <th>Jumlah Guru SD</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" name="nama_sd[]" class="form-control" value="-"></td>
                                            <td><input type="text" name="alamat_sd[]" class="form-control" value="-"></td>
                                            <td><input type="number" name="jumlah_siswa_sd[]" class="form-control" value="0"></td>
                                            <td><input type="number" name="jumlah_guru_sd[]" class="form-control" value="0"></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-sd">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="3">JUMLAH</td>
                                            <td><span id="total_siswa_sd">0</span></td>
                                            <td><span id="total_guru_sd">0</span></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="button" id="add-sd" class="btn btn-primary mt-2">Tambah SD</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- M. Jumlah SMP/MTS -->
                <div class="step-content d-none" id="step14">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-school"></i> M. Jumlah SMP/MTS
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="smp-table">
                                    <thead>
                                        <tr>
                                            <th width="50">NO</th>
                                            <th>Nama SMP/MTS</th>
                                            <th>Alamat SMP/MTS</th>
                                            <th>Peserta Didik SMP/MTS</th>
                                            <th>Jumlah Guru SMP/MTS</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" name="nama_smp[]" class="form-control" value="-"></td>
                                            <td><input type="text" name="alamat_smp[]" class="form-control" value="-"></td>
                                            <td><input type="number" name="jumlah_siswa_smp[]" class="form-control" value="0"></td>
                                            <td><input type="number" name="jumlah_guru_smp[]" class="form-control" value="0"></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-smp">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="3">JUMLAH</td>
                                            <td><span id="total_siswa_smp">0</span></td>
                                            <td><span id="total_guru_smp">0</span></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="button" id="add-smp" class="btn btn-primary mt-2">Tambah SMP/MTS</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- N. Jumlah SMA/SMK -->
                <div class="step-content d-none" id="step15">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-school"></i> N. Jumlah SMA/SMK
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="sma-table">
                                    <thead>
                                        <tr>
                                            <th width="50">NO</th>
                                            <th>Nama SMA/SMK</th>
                                            <th>Alamat SMA/SMK</th>
                                            <th>Peserta Didik SMA/SMK</th>
                                            <th>Jumlah Guru SMA/SMK</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" name="nama_sma[]" class="form-control" value="-"></td>
                                            <td><input type="text" name="alamat_sma[]" class="form-control" value="-"></td>
                                            <td><input type="number" name="jumlah_siswa_sma[]" class="form-control" value="0"></td>
                                            <td><input type="number" name="jumlah_guru_sma[]" class="form-control" value="0"></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-sma">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="3">JUMLAH</td>
                                            <td><span id="total_siswa_sma">0</span></td>
                                            <td><span id="total_guru_sma">0</span></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="button" id="add-sma" class="btn btn-primary mt-2">Tambah SMA/SMK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- O. Jumlah Perguruan Tinggi -->
                <div class="step-content d-none" id="step16">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-university"></i> O. Jumlah Perguruan Tinggi
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="pt-table">
                                    <thead>
                                        <tr>
                                            <th width="50">NO</th>
                                            <th>Nama Perguruan Tinggi</th>
                                            <th>Alamat</th>
                                            <th>Jumlah Mahasiswa</th>
                                            <th>Jumlah Dosen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" name="nama_pt[]" class="form-control" value="-"></td>
                                            <td><input type="text" name="alamat_pt[]" class="form-control" value="-"></td>
                                            <td><input type="number" name="jumlah_mahasiswa_pt[]" class="form-control" value="0"></td>
                                            <td><input type="number" name="jumlah_dosen_pt[]" class="form-control" value="0"></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-pt">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="3">JUMLAH</td>
                                            <td><span id="total_mahasiswa_pt">0</span></td>
                                            <td><span id="total_dosen_pt">0</span></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="button" id="add-pt" class="btn btn-primary mt-2">Tambah Perguruan Tinggi</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- P. Pendidikan Khusus -->
                <div class="step-content d-none" id="step17">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-school"></i> P. Pendidikan Khusus
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="pendidikan-khusus-table">
                                    <thead>
                                        <tr>
                                            <th width="50">NO</th>
                                            <th>Nama Pendidikan Khusus</th>
                                            <th>Alamat</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Jumlah Guru</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" name="nama_pendidikan_khusus[]" class="form-control" value="-"></td>
                                            <td><input type="text" name="alamat_pendidikan_khusus[]" class="form-control" value="-"></td>
                                            <td><input type="number" name="jumlah_siswa_pendidikan_khusus[]" class="form-control" value="0"></td>
                                            <td><input type="number" name="jumlah_guru_pendidikan_khusus[]" class="form-control" value="0"></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-pendidikan-khusus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="3">JUMLAH</td>
                                            <td><span id="total_siswa_pendidikan_khusus">0</span></td>
                                            <td><span id="total_guru_pendidikan_khusus">0</span></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="button" id="add-pendidikan-khusus" class="btn btn-primary mt-2">Tambah Pendidikan Khusus</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Q. Pendidikan Non Formal -->
                <div class="step-content d-none" id="step18">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-school"></i> Q. Pendidikan Non Formal
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="pendidikan-non-formal-table">
                                    <thead>
                                        <tr>
                                            <th width="50">NO</th>
                                            <th>Nama Pendidikan Non Formal</th>
                                            <th>Alamat</th>
                                            <th>Jumlah Peserta</th>
                                            <th>Jumlah Pengajar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" name="nama_pendidikan_non_formal[]" class="form-control" value="-"></td>
                                            <td><input type="text" name="alamat_pendidikan_non_formal[]" class="form-control" value="-"></td>
                                            <td><input type="number" name="jumlah_peserta_non_formal[]" class="form-control" value="0"></td>
                                            <td><input type="number" name="jumlah_pengajar_non_formal[]" class="form-control" value="0"></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-pendidikan-non-formal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="3">JUMLAH</td>
                                            <td><span id="total_peserta_non_formal">0</span></td>
                                            <td><span id="total_pengajar_non_formal">0</span></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="button" id="add-pendidikan-non-formal" class="btn btn-primary mt-2">Tambah Pendidikan Non Formal</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="text-right mt-4">
                    <button type="button" class="btn btn-secondary prev-step d-none">
                        <i class="fas fa-arrow-left"></i> Sebelumnya
                    </button>
                    <button type="button" class="btn btn-primary next-step">
                        Selanjutnya <i class="fas fa-arrow-right"></i>
                    </button>
                    <button type="submit" class="btn btn-success submit-btn d-none">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.step {
    position: relative;
}

.step-icon {
    width: 50px;
    height: 50px;
    background: #f8f9fc;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 10px;
    border: 2px solid #e3e6f0;
}

.step.active .step-icon {
    background: #4e73df;
    color: white;
    border-color: #4e73df;
}

.step-title {
    font-size: 14px;
    color: #858796;
}

.step.active .step-title {
    color: #4e73df;
    font-weight: bold;
}

.step-content {
    transition: all 0.3s ease;
}
</style>
@endpush

@push('scripts')
<script src="{{ asset('js/pendidikan_rt.js') }}"></script>
@endpush