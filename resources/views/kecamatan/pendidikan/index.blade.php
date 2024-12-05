@extends('kecamatan.layout')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-graduation-cap fa-fw"></i> Data Pendidikan
            </h1>
            <div class="text-gray-600 mt-1">
                Data Pendidikan di Wilayah Kecamatan
            </div>
        </div>
    </div>

    <!-- Data RW Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table"></i> Data Pendidikan RW
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>RW</th>
                            <th>Kelurahan</th>
                            <th>Periode</th>
                            <th>Tahun</th>
                            <th>Nama Pengisi</th>
                            <th>Status</th>
                            <th width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendidikanRw as $rw)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>RW.{{ $rw->rw->nomor }}</td>
                            <td>{{ $rw->kelurahan }}</td>
                            <td>{{ $rw->periode }}</td>
                            <td>{{ $rw->tahun }}</td>
                            <td>{{ $rw->nama_pengisi }}</td>
                            <td class="text-center">
                                @if($rw->status == 'Terverifikasi')
                                    <span class="badge badge-success">
                                        <i class="fas fa-check-circle"></i> Terverifikasi
                                    </span>
                                @else
                                    <span class="badge badge-warning">
                                        <i class="fas fa-clock"></i> Belum Verifikasi
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('kecamatan.pendidikan.show', ['id' => $rw->id, 'type' => 'rw']) }}" 
                                   class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Data RT Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table"></i> Data Pendidikan RT
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>RT/RW</th>
                            <th>Kelurahan</th>
                            <th>Periode</th>
                            <th>Tahun</th>
                            <th>Nama Pengisi</th>
                            <th width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendidikanRt as $rt)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>RT.{{ $rt->rt->nomor }}/RW.{{ $rt->rt->rw->nomor }}</td>
                            <td>{{ $rt->kelurahan }}</td>
                            <td>{{ $rt->periode }}</td>
                            <td>{{ $rt->tahun }}</td>
                            <td>{{ $rt->nama_pengisi }}</td>
                            <td class="text-center">
                                <a href="{{ route('kecamatan.pendidikan.show', ['id' => $rt->id, 'type' => 'rt']) }}" 
                                   class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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

.table th {
    font-weight: 600;
    color: #4e73df;
}

.badge {
    padding: .5rem .8rem;
    font-size: .85rem;
}

.btn-sm {
    margin: 0 2px;
}

.fas {
    margin-right: 0.25rem;
}
</style>
@endpush
@endsection