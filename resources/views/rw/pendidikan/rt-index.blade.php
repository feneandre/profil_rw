@extends('rw.layout')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-user-graduate fa-fw"></i> Data Pendidikan RT
            </h1>
            <div class="text-gray-600 mt-1">
                DALAM RANGKA PENCAIRAN DANA INSENTIF RW
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="{{ route('rw.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Pendidikan RT</li>
            </ol>
        </nav>
    </div>

    <!-- Data Table Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
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
                            <th>RT</th>
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
                            <td>RT.{{ $rt->rt->nomor }}</td>
                            <td>{{ $rt->kelurahan }}</td>
                            <td>{{ $rt->periode }}</td>
                            <td>{{ $rt->tahun }}</td>
                            <td>{{ $rt->nama_pengisi }}</td>
                            <td class="text-center">
                                <a href="{{ route('rw.pendidikan-rt.show', $rt->id) }}" class="btn btn-info btn-sm">
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
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15);
    transition: all 0.3s ease;
}

.breadcrumb {
    padding: .5rem 1rem;
    margin: 0;
}

.table th {
    font-weight: 600;
    color: #4e73df;
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