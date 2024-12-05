@extends('rw.layout')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-graduation-cap fa-fw"></i> Detail Data Pendidikan
        </h1>
    </div>

    <!-- Detail Card -->
    <div class="card border-left-primary shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-info-circle"></i> Informasi Detail
            </h6>
            <a href="{{ route('rw.pendidikan.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150">Nomor Surat</th>
                            <td>: {{ $pendidikan->no_surat }}</td>
                        </tr>
                        <tr>
                            <th>Periode</th>
                            <td>: {{ $pendidikan->periode }}</td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <td>: {{ $pendidikan->tahun }}</td>
                        </tr>
                        <tr>
                            <th>Kelurahan</th>
                            <td>: {{ $pendidikan->kelurahan }}</td>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <td>: {{ $pendidikan->kecamatan }}</td>
                        </tr>
                        <tr>
                            <th>Kota</th>
                            <td>: {{ $pendidikan->kota }}</td>
                        </tr>
                        <tr>
                            <th>Provinsi</th>
                            <td>: {{ $pendidikan->provinsi }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150">Nama Pengisi</th>
                            <td>: {{ $pendidikan->nama_pengisi }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td>: {{ $pendidikan->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td>: {{ $pendidikan->jabatan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Input</th>
                            <td>: {{ \Carbon\Carbon::parse($pendidikan->tanggal_input)->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Waktu Input</th>
                            <td>: {{ $pendidikan->waktu_input }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.card {
    border: none;
    margin-bottom: 1.5rem;
}

.border-left-primary {
    border-left: .25rem solid #4e73df !important;
}

.table-borderless th,
.table-borderless td {
    padding: 0.5rem 0;
}

.fas {
    margin-right: 0.5rem;
}
</style>
@endpush
@endsection