@extends('rw.layout')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-plus-circle fa-fw"></i> Tambah Data Pendidikan
            </h1>
            <div class="text-gray-600 mt-1">
                DALAM RANGKA PENCAIRAN DANA INSENTIF RW
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('rw.pendidikan.index') }}">Data Pendidikan</a></li>
                <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
        </nav>
    </div>

    <!-- Form Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-edit"></i> Form Input Data
            </h6>
            <a href="{{ route('rw.pendidikan.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
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

            <form action="{{ route('rw.pendidikan.store') }}" method="POST">
                @csrf
                <!-- Hidden inputs untuk data wilayah -->
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

                <div class="text-right mt-4">
                    <a href="{{ route('rw.pendidikan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary ml-2">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
.card {
    border: none;
    margin-bottom: 1.5rem;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15);
}

.card-header {
    background-color: #f8f9fc;
    border-bottom: 1px solid #e3e6f0;
}

.form-group label {
    color: #4e73df;
}

.form-control {
    border: 1px solid #d1d3e2;
    border-radius: .35rem;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6e707e;
    background-color: #fff;
}

.form-control:focus {
    border-color: #bac8f3;
    box-shadow: 0 0 0 0.2rem rgba(78,115,223,.25);
}

.btn {
    padding: .375rem .75rem;
    font-size: .875rem;
}

.breadcrumb {
    padding: .5rem 1rem;
    margin: 0;
    background: transparent;
}

.fas {
    margin-right: 0.25rem;
}
</style>
@endpush
@endsection