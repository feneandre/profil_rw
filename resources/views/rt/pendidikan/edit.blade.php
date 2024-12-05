@extends('rt.layout')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-edit fa-fw"></i> Edit Data Pendidikan
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
                <i class="fas fa-edit"></i> Form Edit Data
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

            <form action="{{ route('rt.pendidikan.update', $pendidikan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Step 1: Data Umum -->
                <div class="step-content" id="step1">
                    <input type="hidden" name="kecamatan" value="Kesambi">
                    <input type="hidden" name="kota" value="Cirebon">
                    <input type="hidden" name="provinsi" value="Jawa Barat">

                    <div class="form-group">
                        <label class="font-weight-bold">Nomor Surat</label>
                        <input type="text" class="form-control @error('no_surat') is-invalid @enderror" 
                               name="no_surat" value="{{ old('no_surat', $pendidikan->no_surat) }}" required>
                        @error('no_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Periode</label>
                        <select class="form-control @error('periode') is-invalid @enderror" name="periode" required>
                            <option value="">Pilih Periode</option>
                            <option value="Triwulan 1" {{ $pendidikan->periode == 'Triwulan 1' ? 'selected' : '' }}>Triwulan 1 (Januari-Maret)</option>
                            <option value="Triwulan 2" {{ $pendidikan->periode == 'Triwulan 2' ? 'selected' : '' }}>Triwulan 2 (April-Juni)</option>
                            <option value="Triwulan 3" {{ $pendidikan->periode == 'Triwulan 3' ? 'selected' : '' }}>Triwulan 3 (Juli-September)</option>
                            <option value="Triwulan 4" {{ $pendidikan->periode == 'Triwulan 4' ? 'selected' : '' }}>Triwulan 4 (Oktober-Desember)</option>
                        </select>
                        @error('periode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Tahun</label>
                        <input type="number" class="form-control @error('tahun') is-invalid @enderror" 
                               name="tahun" value="{{ old('tahun', $pendidikan->tahun) }}" required>
                        @error('tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Kelurahan</label>
                        <select class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" required>
                            <option value="">Pilih Kelurahan</option>
                            <option value="Kesambi" {{ $pendidikan->kelurahan == 'Kesambi' ? 'selected' : '' }}>Kelurahan Kesambi</option>
                            <option value="Drajat" {{ $pendidikan->kelurahan == 'Drajat' ? 'selected' : '' }}>Kelurahan Drajat</option>
                            <option value="Pekiringan" {{ $pendidikan->kelurahan == 'Pekiringan' ? 'selected' : '' }}>Kelurahan Pekiringan</option>
                            <option value="Sunyaragi" {{ $pendidikan->kelurahan == 'Sunyaragi' ? 'selected' : '' }}>Kelurahan Sunyaragi</option>
                            <option value="Karyamulya" {{ $pendidikan->kelurahan == 'Karyamulya' ? 'selected' : '' }}>Kelurahan Karyamulya</option>
                        </select>
                        @error('kelurahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Nama Pengisi</label>
                        <input type="text" class="form-control @error('nama_pengisi') is-invalid @enderror" 
                               name="nama_pengisi" value="{{ old('nama_pengisi', $pendidikan->nama_pengisi) }}" required>
                        @error('nama_pengisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Pekerjaan</label>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" 
                               name="pekerjaan" value="{{ old('pekerjaan', $pendidikan->pekerjaan) }}" required>
                        @error('pekerjaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" 
                               name="jabatan" value="{{ old('jabatan', $pendidikan->jabatan) }}" required>
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal Input</label>
                        <input type="date" class="form-control @error('tanggal_input') is-invalid @enderror" 
                               name="tanggal_input" value="{{ old('tanggal_input', $pendidikan->tanggal_input) }}" required>
                        @error('tanggal_input')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Waktu Input</label>
                        <input type="time" class="form-control @error('waktu_input') is-invalid @enderror" 
                               name="waktu_input" value="{{ old('waktu_input', $pendidikan->waktu_input) }}" required>
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
                                        <input type="text" name="batas_utara" class="form-control" value="{{ old('batas_utara', $pendidikan->batas_utara) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Batas Selatan</label>
                                        <input type="text" name="batas_selatan" class="form-control" value="{{ old('batas_selatan', $pendidikan->batas_selatan) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Batas Timur</label>
                                        <input type="text" name="batas_timur" class="form-control" value="{{ old('batas_timur', $pendidikan->batas_timur) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Batas Barat</label>
                                        <input type="text" name="batas_barat" class="form-control" value="{{ old('batas_barat', $pendidikan->batas_barat) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Luas Wilayah (Ha)</label>
                                        <input type="number" step="0.01" name="luas_wilayah" class="form-control" value="{{ old('luas_wilayah', $pendidikan->luas_wilayah) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Sarana Pendidikan (%)</label>
                                        <input type="number" step="0.01" name="sarana_pendidikan" class="form-control" value="{{ old('sarana_pendidikan', $pendidikan->sarana_pendidikan) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Sarana Olahraga (%)</label>
                                        <input type="number" step="0.01" name="sarana_olahraga" class="form-control" value="{{ old('sarana_olahraga', $pendidikan->sarana_olahraga) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Sarana Pariwisata (%)</label>
                                        <input type="number" step="0.01" name="sarana_pariwisata" class="form-control" value="{{ old('sarana_pariwisata', $pendidikan->sarana_pariwisata) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanah Lapang (%)</label>
                                        <input type="number" step="0.01" name="tanah_lapang" class="form-control" value="{{ old('tanah_lapang', $pendidikan->tanah_lapang) }}">
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
                                           class="form-control" value="{{ old('jumlah_laki', $pendidikan->jumlah_laki) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah Perempuan</label>
                                <div class="col-sm-9">
                                    <input type="number" name="jumlah_perempuan" id="jumlah_perempuan" 
                                           class="form-control" value="{{ old('jumlah_perempuan', $pendidikan->jumlah_perempuan) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah KK</label>
                                <div class="col-sm-9">
                                    <input type="number" name="jumlah_kk" id="jumlah_kk" 
                                           class="form-control" value="{{ old('jumlah_kk', $pendidikan->jumlah_kk) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Penduduk</label>
                                <div class="col-sm-9">
                                    <input type="number" name="jumlah_penduduk" id="jumlah_penduduk" 
                                           class="form-control" value="{{ old('jumlah_penduduk', $pendidikan->jumlah_penduduk) }}" readonly>
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
                                    <input type="number" name="jumlah_laki_usia" id="sdm_laki" class="form-control" 
                                           value="{{ old('jumlah_laki', $pendidikan->jumlah_laki) }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Perempuan</label>
                                <div class="col-sm-9">
                                    <input type="number" name="jumlah_perempuan_usia" id="sdm_perempuan" class="form-control" 
                                           value="{{ old('jumlah_perempuan', $pendidikan->jumlah_perempuan) }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total KK</label>
                                <div class="col-sm-9">
                                    <input type="number" name="jumlah_kk" id="sdm_kk" class="form-control" 
                                           value="{{ old('jumlah_kk', $pendidikan->jumlah_kk) }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Penduduk</label>
                                <div class="col-sm-9">
                                    <input type="number" name="jumlah_penduduk_usia" id="sdm_total" class="form-control" 
                                           value="{{ old('jumlah_total', $pendidikan->jumlah_total) }}" readonly>
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
                                <i class="fas fa-users"></i> D. Data Usia
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Usia</th>
                                            <th>Laki-laki</th>
                                            <th>Perempuan</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>0-4</td>
                                            <td><input type="number" name="usia_0_4_l" class="form-control usia-input" value="{{ old('usia_0_4_l', $pendidikan->usia_0_4_l) }}"></td>
                                            <td><input type="number" name="usia_0_4_p" class="form-control usia-input" value="{{ old('usia_0_4_p', $pendidikan->usia_0_4_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>5-9</td>
                                            <td><input type="number" name="usia_5_9_l" class="form-control usia-input" value="{{ old('usia_5_9_l', $pendidikan->usia_5_9_l) }}"></td>
                                            <td><input type="number" name="usia_5_9_p" class="form-control usia-input" value="{{ old('usia_5_9_p', $pendidikan->usia_5_9_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>10-14</td>
                                            <td><input type="number" name="usia_10_14_l" class="form-control usia-input" value="{{ old('usia_10_14_l', $pendidikan->usia_10_14_l) }}"></td>
                                            <td><input type="number" name="usia_10_14_p" class="form-control usia-input" value="{{ old('usia_10_14_p', $pendidikan->usia_10_14_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>15-19</td>
                                            <td><input type="number" name="usia_15_19_l" class="form-control usia-input" value="{{ old('usia_15_19_l', $pendidikan->usia_15_19_l) }}"></td>
                                            <td><input type="number" name="usia_15_19_p" class="form-control usia-input" value="{{ old('usia_15_19_p', $pendidikan->usia_15_19_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>20-24</td>
                                            <td><input type="number" name="usia_20_24_l" class="form-control usia-input" value="{{ old('usia_20_24_l', $pendidikan->usia_20_24_l) }}"></td>
                                            <td><input type="number" name="usia_20_24_p" class="form-control usia-input" value="{{ old('usia_20_24_p', $pendidikan->usia_20_24_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>25-29 Tahun</td>
                                            <td><input type="number" name="usia_25_29_l" class="form-control usia-input" value="{{ old('usia_25_29_l', $pendidikan->usia_25_29_l) }}"></td>
                                            <td><input type="number" name="usia_25_29_p" class="form-control usia-input" value="{{ old('usia_25_29_p', $pendidikan->usia_25_29_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>30-34 Tahun</td>
                                            <td><input type="number" name="usia_30_34_l" class="form-control usia-input" value="{{ old('usia_30_34_l', $pendidikan->usia_30_34_l) }}"></td>
                                            <td><input type="number" name="usia_30_34_p" class="form-control usia-input" value="{{ old('usia_30_34_p', $pendidikan->usia_30_34_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>35-39 Tahun</td>
                                            <td><input type="number" name="usia_35_39_l" class="form-control usia-input" value="{{ old('usia_35_39_l', $pendidikan->usia_35_39_l) }}"></td>
                                            <td><input type="number" name="usia_35_39_p" class="form-control usia-input" value="{{ old('usia_35_39_p', $pendidikan->usia_35_39_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>40-44 Tahun</td>
                                            <td><input type="number" name="usia_40_44_l" class="form-control usia-input" value="{{ old('usia_40_44_l', $pendidikan->usia_40_44_l) }}"></td>
                                            <td><input type="number" name="usia_40_44_p" class="form-control usia-input" value="{{ old('usia_40_44_p', $pendidikan->usia_40_44_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>45-49 Tahun</td>
                                            <td><input type="number" name="usia_45_49_l" class="form-control usia-input" value="{{ old('usia_45_49_l', $pendidikan->usia_45_49_l) }}"></td>
                                            <td><input type="number" name="usia_45_49_p" class="form-control usia-input" value="{{ old('usia_45_49_p', $pendidikan->usia_45_49_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>50-54 Tahun</td>
                                            <td><input type="number" name="usia_50_54_l" class="form-control usia-input" value="{{ old('usia_50_54_l', $pendidikan->usia_50_54_l) }}"></td>
                                            <td><input type="number" name="usia_50_54_p" class="form-control usia-input" value="{{ old('usia_50_54_p', $pendidikan->usia_50_54_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>55-59 Tahun</td>
                                            <td><input type="number" name="usia_55_59_l" class="form-control usia-input" value="{{ old('usia_55_59_l', $pendidikan->usia_55_59_l) }}"></td>
                                            <td><input type="number" name="usia_55_59_p" class="form-control usia-input" value="{{ old('usia_55_59_p', $pendidikan->usia_55_59_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>60-64 Tahun</td>
                                            <td><input type="number" name="usia_60_64_l" class="form-control usia-input" value="{{ old('usia_60_64_l', $pendidikan->usia_60_64_l) }}"></td>
                                            <td><input type="number" name="usia_60_64_p" class="form-control usia-input" value="{{ old('usia_60_64_p', $pendidikan->usia_60_64_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td>65-69 Tahun</td>
                                            <td><input type="number" name="usia_65_69_l" class="form-control usia-input" value="{{ old('usia_65_69_l', $pendidikan->usia_65_69_l) }}"></td>
                                            <td><input type="number" name="usia_65_69_p" class="form-control usia-input" value="{{ old('usia_65_69_p', $pendidikan->usia_65_69_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>70-74 Tahun</td>
                                            <td><input type="number" name="usia_70_74_l" class="form-control usia-input" value="{{ old('usia_70_74_l', $pendidikan->usia_70_74_l) }}"></td>
                                            <td><input type="number" name="usia_70_74_p" class="form-control usia-input" value="{{ old('usia_70_74_p', $pendidikan->usia_70_74_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>16</td>
                                            <td>75+ Tahun</td>
                                            <td><input type="number" name="usia_75_plus_l" class="form-control usia-input" value="{{ old('usia_75_plus_l', $pendidikan->usia_75_plus_l) }}"></td>
                                            <td><input type="number" name="usia_75_plus_p" class="form-control usia-input" value="{{ old('usia_75_plus_p', $pendidikan->usia_75_plus_p) }}"></td>
                                            <td><span class="total-per-usia">0</span></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="2">TOTAL</td>
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
                                            <td><input type="number" name="petani_l" class="form-control pekerjaan-input" value="{{ old('petani_l', $pendidikan->petani_l) }}"></td>
                                            <td><input type="number" name="petani_p" class="form-control pekerjaan-input" value="{{ old('petani_p', $pendidikan->petani_p) }}"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Buruh Tani</td>
                                            <td><input type="number" name="buruh_tani_l" class="form-control pekerjaan-input" value="{{ old('buruh_tani_l', $pendidikan->buruh_tani_l) }}"></td>
                                            <td><input type="number" name="buruh_tani_p" class="form-control pekerjaan-input" value="{{ old('buruh_tani_p', $pendidikan->buruh_tani_p) }}"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Pegawai Negeri Sipil</td>
                                            <td><input type="number" name="pns_l" class="form-control pekerjaan-input" value="{{ old('pns_l', $pendidikan->pns_l) }}"></td>
                                            <td><input type="number" name="pns_p" class="form-control pekerjaan-input" value="{{ old('pns_p', $pendidikan->pns_p) }}"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Pengrajin</td>
                                            <td><input type="number" name="pengrajin_l" class="form-control pekerjaan-input" value="{{ old('pengrajin_l', $pendidikan->pengrajin_l) }}"></td>
                                            <td><input type="number" name="pengrajin_p" class="form-control pekerjaan-input" value="{{ old('pengrajin_p', $pendidikan->pengrajin_p) }}"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Pedagang</td>
                                            <td><input type="number" name="pedagang_l" class="form-control pekerjaan-input" value="{{ old('pedagang_l', $pendidikan->pedagang_l) }}"></td>
                                            <td><input type="number" name="pedagang_p" class="form-control pekerjaan-input" value="{{ old('pedagang_p', $pendidikan->pedagang_p) }}"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Peternakan</td>
                                            <td><input type="number" name="peternak_l" class="form-control pekerjaan-input" value="{{ old('peternak_l', $pendidikan->peternak_l) }}"></td>
                                            <td><input type="number" name="peternak_p" class="form-control pekerjaan-input" value="{{ old('peternak_p', $pendidikan->peternak_p) }}"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter Swasta</td>
                                            <td><input type="number" name="dokter_swasta_l" class="form-control pekerjaan-input" value="{{ old('dokter_swasta_l', $pendidikan->dokter_swasta_l) }}"></td>
                                            <td><input type="number" name="dokter_swasta_p" class="form-control pekerjaan-input" value="{{ old('dokter_swasta_p', $pendidikan->dokter_swasta_p) }}"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Bidan Swasta</td>
                                            <td><input type="number" name="bidan_swasta_l" class="form-control pekerjaan-input" value="{{ old('bidan_swasta_l', $pendidikan->bidan_swasta_l) }}"></td>
                                            <td><input type="number" name="bidan_swasta_p" class="form-control pekerjaan-input" value="{{ old('bidan_swasta_p', $pendidikan->bidan_swasta_p) }}"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>TNI/POLRI</td>
                                            <td><input type="number" name="tni_polri_l" class="form-control pekerjaan-input" value="{{ old('tni_polri_l', $pendidikan->tni_polri_l) }}"></td>
                                            <td><input type="number" name="tni_polri_p" class="form-control pekerjaan-input" value="{{ old('tni_polri_p', $pendidikan->tni_polri_p) }}"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Pensiunan TNI/POLRI</td>
                                            <td><input type="number" name="pensiunan_tni_polri_l" class="form-control pekerjaan-input" value="{{ old('pensiunan_tni_polri_l', $pendidikan->pensiunan_tni_polri_l) }}"></td>
                                            <td><input type="number" name="pensiunan_tni_polri_p" class="form-control pekerjaan-input" value="{{ old('pensiunan_tni_polri_p', $pendidikan->pensiunan_tni_polri_p) }}"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Pensiunan PNS</td>
                                            <td><input type="number" name="pensiunan_pns_l" class="form-control pekerjaan-input" value="{{ old('pensiunan_pns_l', $pendidikan->pensiunan_pns_l) }}"></td>
                                            <td><input type="number" name="pensiunan_pns_p" class="form-control pekerjaan-input" value="{{ old('pensiunan_pns_p', $pendidikan->pensiunan_pns_p) }}"></td>
                                            <td><span class="total-per-pekerjaan">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Pensiunan TNI/POLRI</td>
                                            <td><input type="number" name="pensiunan_tni_polri_l" class="form-control pekerjaan-input" value="{{ old('pensiunan_tni_polri_l', $pendidikan->pensiunan_tni_polri_l) }}"></td>
                                            <td><input type="number" name="pensiunan_tni_polri_p" class="form-control pekerjaan-input" value="{{ old('pensiunan_tni_polri_p', $pendidikan->pensiunan_tni_polri_p) }}"></td>
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
                                            <th>NO</th>
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
                                            <td><input type="number" name="islam_l" class="form-control agama-input" value="{{ old('islam_l', $pendidikan->islam_l) }}"></td>
                                            <td><input type="number" name="islam_p" class="form-control agama-input" value="{{ old('islam_p', $pendidikan->islam_p) }}"></td>
                                            <td><span class="total-per-agama">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>KRISTEN</td>
                                            <td><input type="number" name="kristen_l" class="form-control agama-input" value="{{ old('kristen_l', $pendidikan->kristen_l) }}"></td>
                                            <td><input type="number" name="kristen_p" class="form-control agama-input" value="{{ old('kristen_p', $pendidikan->kristen_p) }}"></td>
                                            <td><span class="total-per-agama">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>KATOLIK</td>
                                            <td><input type="number" name="katholik_l" class="form-control agama-input" value="{{ old('katholik_l', $pendidikan->katholik_l) }}"></td>
                                            <td><input type="number" name="katholik_p" class="form-control agama-input" value="{{ old('katholik_p', $pendidikan->katholik_p) }}"></td>
                                            <td><span class="total-per-agama">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>HINDU</td>
                                            <td><input type="number" name="hindu_l" class="form-control agama-input" value="{{ old('hindu_l', $pendidikan->hindu_l) }}"></td>
                                            <td><input type="number" name="hindu_p" class="form-control agama-input" value="{{ old('hindu_p', $pendidikan->hindu_p) }}"></td>
                                            <td><span class="total-per-agama">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>BUDHA</td>
                                            <td><input type="number" name="budha_l" class="form-control agama-input" value="{{ old('budha_l', $pendidikan->budha_l) }}"></td>
                                            <td><input type="number" name="budha_p" class="form-control agama-input" value="{{ old('budha_p', $pendidikan->budha_p) }}"></td>
                                            <td><span class="total-per-agama">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>KONGHUCU</td>
                                            <td><input type="number" name="khonghucu_l" class="form-control agama-input" value="{{ old('khonghucu_l', $pendidikan->khonghucu_l) }}"></td>
                                            <td><input type="number" name="khonghucu_p" class="form-control agama-input" value="{{ old('khonghucu_p', $pendidikan->khonghucu_p) }}"></td>
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
                                            <td><input type="number" name="wni_l" class="form-control warga-input" value="{{ old('wni_l', $pendidikan->wni_l) }}"></td>
                                            <td><input type="number" name="wni_p" class="form-control warga-input" value="{{ old('wni_p', $pendidikan->wni_p) }}"></td>
                                            <td><span class="total-per-warga">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Warga Negara Asing</td>
                                            <td><input type="number" name="wna_l" class="form-control warga-input" value="{{ old('wna_l', $pendidikan->wna_l) }}"></td>
                                            <td><input type="number" name="wna_p" class="form-control warga-input" value="{{ old('wna_p', $pendidikan->wna_p) }}"></td>
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
                                            <td><input type="number" name="tuna_rungu_l" class="form-control cacat-input" value="{{ old('tuna_rungu_l', $pendidikan->tuna_rungu_l) }}"></td>
                                            <td><input type="number" name="tuna_rungu_p" class="form-control cacat-input" value="{{ old('tuna_rungu_p', $pendidikan->tuna_rungu_p) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td> 
                                            <td>Tuna Wicara</td>
                                            <td><input type="number" name="tuna_wicara_l" class="form-control cacat-input" value="{{ old('tuna_wicara_l', $pendidikan->tuna_wicara_l) }}"></td>
                                            <td><input type="number" name="tuna_wicara_p" class="form-control cacat-input" value="{{ old('tuna_wicara_p', $pendidikan->tuna_wicara_p) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Tuna Netra</td>
                                            <td><input type="number" name="tuna_netra_l" class="form-control cacat-input" value="{{ old('tuna_netra_l', $pendidikan->tuna_netra_l) }}"></td>
                                            <td><input type="number" name="tuna_netra_p" class="form-control cacat-input" value="{{ old('tuna_netra_p', $pendidikan->tuna_netra_p) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Lumpuh</td>
                                            <td><input type="number" name="lumpuh_l" class="form-control cacat-input" value="{{ old('lumpuh_l', $pendidikan->lumpuh_l) }}"></td>
                                            <td><input type="number" name="lumpuh_p" class="form-control cacat-input" value="{{ old('lumpuh_p', $pendidikan->lumpuh_p) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Sumbing</td>
                                            <td><input type="number" name="sumbing_l" class="form-control cacat-input" value="{{ old('sumbing_l', $pendidikan->sumbing_l) }}"></td>
                                            <td><input type="number" name="sumbing_p" class="form-control cacat-input" value="{{ old('sumbing_p', $pendidikan->sumbing_p) }}"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="2">JUMLAH</td>
                                            <td><span id="total_laki_cacat_fisik">{{ $pendidikan->total_cacat_fisik_laki }}</span></td>
                                            <td><span id="total_perempuan_cacat_fisik">{{ $pendidikan->total_cacat_fisik_perempuan }}</span></td>
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
                                        <td><input type="number" name="idiot_l" class="form-control cacat-input" value="{{ old('idiot_l', $pendidikan->idiot_l) }}"></td>
                                        <td><input type="number" name="idiot_p" class="form-control cacat-input" value="{{ old('idiot_p', $pendidikan->idiot_p) }}"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Gila</td>
                                        <td><input type="number" name="gila_l" class="form-control cacat-input" value="{{ old('gila_l', $pendidikan->gila_l) }}"></td>
                                        <td><input type="number" name="gila_p" class="form-control cacat-input" value="{{ old('gila_p', $pendidikan->gila_p) }}"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Stress</td>
                                        <td><input type="number" name="stress_l" class="form-control cacat-input" value="{{ old('stress_l', $pendidikan->stress_l) }}"></td>
                                        <td><input type="number" name="stress_p" class="form-control cacat-input" value="{{ old('stress_p', $pendidikan->stress_p) }}"></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Autis</td>
                                        <td><input type="number" name="autis_l" class="form-control cacat-input" value="{{ old('autis_l', $pendidikan->autis_l) }}"></td>
                                            <td><input type="number" name="autis_p" class="form-control cacat-input" value="{{ old('autis_p', $pendidikan->autis_p) }}"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="2">JUMLAH</td>
                                            <td><span id="total_laki_cacat_mental">{{ $pendidikan->total_cacat_mental_laki }}</span></td>
                                            <td><span id="total_perempuan_cacat_mental">{{ $pendidikan->total_cacat_mental_perempuan }}</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 10: Tenaga Kerja -->
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
                                            <td><input type="number" name="penduduk_usia_18_56_l" class="form-control" value="{{ old('penduduk_usia_18_56_l', $pendidikan->penduduk_usia_18_56_l) }}"></td>
                                            <td><input type="number" name="penduduk_usia_18_56_p" class="form-control" value="{{ old('penduduk_usia_18_56_p', $pendidikan->penduduk_usia_18_56_p) }}"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>a. Penduduk usia 18 - 58 tahun yang bekerja</td>
                                            <td><input type="number" name="penduduk_usia_18_58_bekerja_l" class="form-control" value="{{ old('penduduk_usia_18_58_bekerja_l', $pendidikan->penduduk_usia_18_58_bekerja_l) }}"></td>
                                            <td><input type="number" name="penduduk_usia_18_58_bekerja_p" class="form-control" value="{{ old('penduduk_usia_18_58_bekerja_p', $pendidikan->penduduk_usia_18_58_bekerja_p) }}"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>b. Penduduk usia 18 - 58 tahun yang belum bekerja</td>
                                            <td><input type="number" name="penduduk_usia_18_58_tidak_bekerja_l" class="form-control" value="{{ old('penduduk_usia_18_58_tidak_bekerja_l', $pendidikan->penduduk_usia_18_58_tidak_bekerja_l) }}"></td>
                                            <td><input type="number" name="penduduk_usia_18_58_tidak_bekerja_p" class="form-control" value="{{ old('penduduk_usia_18_58_tidak_bekerja_p', $pendidikan->penduduk_usia_18_58_tidak_bekerja_p) }}"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Penduduk usia 58 tahun ke atas</td>
                                            <td><input type="number" name="penduduk_usia_58_keatas_l" class="form-control" value="{{ old('penduduk_usia_58_keatas_l', $pendidikan->penduduk_usia_58_keatas_l) }}"></td>
                                            <td><input type="number" name="penduduk_usia_58_keatas_p" class="form-control" value="{{ old('penduduk_usia_58_keatas_p', $pendidikan->penduduk_usia_58_keatas_p) }}"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>a. Penduduk usia 58 tahun ke atas yang bekerja</td>
                                            <td><input type="number" name="penduduk_usia_58_keatas_bekerja_l" class="form-control" value="{{ old('penduduk_usia_58_keatas_bekerja_l', $pendidikan->penduduk_usia_58_keatas_bekerja_l) }}"></td>
                                            <td><input type="number" name="penduduk_usia_58_keatas_bekerja_p" class="form-control" value="{{ old('penduduk_usia_58_keatas_bekerja_p', $pendidikan->penduduk_usia_58_keatas_bekerja_p) }}"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>b. Penduduk usia 58 tahun ke atas yang belum bekerja</td>
                                            <td><input type="number" name="penduduk_usia_58_keatas_tidak_bekerja_l" class="form-control" value="{{ old('penduduk_usia_58_keatas_tidak_bekerja_l', $pendidikan->penduduk_usia_58_keatas_tidak_bekerja_l) }}"></td>
                                            <td><input type="number" name="penduduk_usia_58_keatas_tidak_bekerja_p" class="form-control" value="{{ old('penduduk_usia_58_keatas_tidak_bekerja_p', $pendidikan->penduduk_usia_58_keatas_tidak_bekerja_p) }}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 11: PAUD -->
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
                                        @php
                                            $paudData = json_decode($pendidikan->nama_paud, true) ?? [];
                                        @endphp

                                        @if(count($paudData) > 0)
                                            @foreach($paudData as $index => $paud)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td><input type="text" name="nama_paud[]" class="form-control" value="{{ old('nama_paud.'.$index, $paud['nama']) }}"></td>
                                                <td><input type="text" name="alamat_paud[]" class="form-control" value="{{ old('alamat_paud.'.$index, $paud['alamat']) }}"></td>
                                                <td><input type="number" name="jumlah_siswa_paud[]" class="form-control" value="{{ old('jumlah_siswa_paud.'.$index, $paud['jumlah_siswa']) }}"></td>
                                                <td><input type="number" name="jumlah_pengajar_paud[]" class="form-control" value="{{ old('jumlah_pengajar_paud.'.$index, $paud['jumlah_pengajar']) }}"></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm remove-paud">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>1</td>
                                                <td><input type="text" name="nama_paud[]" class="form-control"></td>
                                                <td><input type="text" name="alamat_paud[]" class="form-control"></td>
                                                <td><input type="number" name="jumlah_siswa_paud[]" class="form-control"></td>
                                                <td><input type="number" name="jumlah_pengajar_paud[]" class="form-control"></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm remove-paud">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light font-weight-bold">
                                            <td colspan="3">JUMLAH</td>
                                            <td><span id="total_siswa_paud">{{ $paudData ? array_sum(array_column($paudData, 'jumlah_siswa')) : 0 }}</span></td>
                                            <td><span id="total_guru_paud">{{ $paudData ? array_sum(array_column($paudData, 'jumlah_pengajar')) : 0 }}</span></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="button" id="add-paud" class="btn btn-primary mt-2">Tambah PAUD</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 12: TK -->
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
                                        @php
                                            $tkData = json_decode($pendidikan->data_tk ?? '[]', true);
                                        @endphp

                                        @if(is_array($tkData) && count($tkData) > 0)
                                            @foreach($tkData as $index => $tk)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td><input type="text" name="nama_tk[]" class="form-control" value="{{ $tk['nama'] }}"></td>
                                                <td><input type="text" name="alamat_tk[]" class="form-control" value="{{ $tk['alamat'] }}"></td>
                                                <td><input type="number" name="jumlah_siswa_tk[]" class="form-control" value="{{ $tk['jumlah_siswa'] }}"></td>
                                                <td><input type="number" name="jumlah_guru_tk[]" class="form-control" value="{{ $tk['jumlah_guru'] }}"></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm remove-tk">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>1</td>
                                                <td><input type="text" name="nama_tk[]" class="form-control"></td>
                                                <td><input type="text" name="alamat_tk[]" class="form-control"></td>
                                                <td><input type="number" name="jumlah_siswa_tk[]" class="form-control" value="0"></td>
                                                <td><input type="number" name="jumlah_guru_tk[]" class="form-control" value="0"></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm remove-tk">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endif
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

                <!-- Step 13: SD -->
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
                                        @php
                                            $sdData = json_decode($pendidikan->data_sd ?? '[]', true);
                                        @endphp

                                        @if(is_array($sdData) && count($sdData) > 0)
                                            @foreach($sdData as $index => $sd)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td><input type="text" name="nama_sd[]" class="form-control" value="{{ $sd['nama'] }}"></td>
                                                <td><input type="text" name="alamat_sd[]" class="form-control" value="{{ $sd['alamat'] }}"></td>
                                                <td><input type="number" name="jumlah_siswa_sd[]" class="form-control" value="{{ $sd['jumlah_siswa'] }}"></td>
                                                <td><input type="number" name="jumlah_guru_sd[]" class="form-control" value="{{ $sd['jumlah_guru'] }}"></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm remove-sd">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>1</td>
                                                <td><input type="text" name="nama_sd[]" class="form-control"></td>
                                                <td><input type="text" name="alamat_sd[]" class="form-control"></td>
                                                <td><input type="number" name="jumlah_siswa_sd[]" class="form-control" value="0"></td>
                                                <td><input type="number" name="jumlah_guru_sd[]" class="form-control" value="0"></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm remove-sd">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endif
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
                                <button type="button" class="btn btn-primary btn-sm mt-2" id="add-sd">
                                    <i class="fas fa-plus"></i> Tambah SD
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 14: SMP -->
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
                                        @php
                                            $smpData = json_decode($pendidikan->data_smp ?? '[]', true);
                                        @endphp

                                        @if(is_array($smpData) && count($smpData) > 0)
                                            @foreach($smpData as $index => $smp)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td><input type="text" name="nama_smp[]" class="form-control" value="{{ $smp['nama'] }}"></td>
                                                <td><input type="text" name="alamat_smp[]" class="form-control" value="{{ $smp['alamat'] }}"></td>
                                                <td><input type="number" name="jumlah_siswa_smp[]" class="form-control" value="{{ $smp['jumlah_siswa'] }}"></td>
                                                <td><input type="number" name="jumlah_guru_smp[]" class="form-control" value="{{ $smp['jumlah_guru'] }}"></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm remove-smp">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>1</td>
                                                <td><input type="text" name="nama_smp[]" class="form-control"></td>
                                                <td><input type="text" name="alamat_smp[]" class="form-control"></td>
                                                <td><input type="number" name="jumlah_siswa_smp[]" class="form-control" value="0"></td>
                                                <td><input type="number" name="jumlah_guru_smp[]" class="form-control" value="0"></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm remove-smp">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endif
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
                                <button type="button" class="btn btn-primary btn-sm mt-2" id="add-smp">
                                    <i class="fas fa-plus"></i> Tambah SMP/MTS
                                </button>
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
@endsection
