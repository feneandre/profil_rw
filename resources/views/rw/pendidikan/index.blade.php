@extends('rw.layout')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-graduation-cap fa-fw"></i> Data Pendidikan RW.03
            </h1>
            <div class="text-gray-600 mt-1">
                DALAM RANGKA PENCAIRAN DANA INSENTIF RW
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Pendidikan</li>
            </ol>
        </nav>
    </div>

    <!-- Filter Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-filter"></i> Filter Data
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('rw.pendidikan.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Periode</label>
                            <select class="form-control" name="periode">
                                <option value="">Semua Periode</option>
                                <option value="Triwulan 1" {{ request('periode') == 'Triwulan 1' ? 'selected' : '' }}>Triwulan 1 (Jan-Mar)</option>
                                <option value="Triwulan 2" {{ request('periode') == 'Triwulan 2' ? 'selected' : '' }}>Triwulan 2 (Apr-Jun)</option>
                                <option value="Triwulan 3" {{ request('periode') == 'Triwulan 3' ? 'selected' : '' }}>Triwulan 3 (Jul-Sep)</option>
                                <option value="Triwulan 4" {{ request('periode') == 'Triwulan 4' ? 'selected' : '' }}>Triwulan 4 (Okt-Des)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Tahun</label>
                            <select class="form-control" name="tahun">
                                <option value="">Semua Tahun</option>
                                <option value="2024" {{ request('tahun') == '2024' ? 'selected' : '' }}>2024</option>
                                <option value="2023" {{ request('tahun') == '2023' ? 'selected' : '' }}>2023</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Status</label>
                            <select class="form-control" name="status">
                                <option value="">Semua Status</option>
                                <option value="Terverifikasi" {{ request('status') == 'Terverifikasi' ? 'selected' : '' }}>Terverifikasi</option>
                                <option value="Belum Verifikasi" {{ request('status') == 'Belum Verifikasi' ? 'selected' : '' }}>Belum Verifikasi</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-3">
                    <a href="{{ route('rw.pendidikan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-sync"></i> Reset
                    </a>
                    <button type="submit" class="btn btn-primary ml-2">
                        <i class="fas fa-search"></i> Cari Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table"></i> Data Pendidikan RW.03
            </h6>
            <a href="{{ route('rw.pendidikan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Kelurahan</th>
                            <th>Periode</th>
                            <th>Tahun</th>
                            <th>Nama Pengisi</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendidikan as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->kelurahan }}</td>
                            <td>{{ $data->periode }}</td>
                            <td>{{ $data->tahun }}</td>
                            <td>{{ $data->nama_pengisi }}</td>
                            <td class="text-center">
                                @if($data->status == 'Terverifikasi')
                                    <span class="badge badge-success">
                                        <i class="fas fa-check-circle"></i> Terverifikasi
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        <i class="fas fa-clock"></i> Belum Verifikasi
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('rw.pendidikan.show', $data->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('rw.pendidikan.edit', $data->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('rw.pendidikan.destroy', $data->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
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
.badge {
    padding: .5rem .8rem;
    font-size: .85rem;
}

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

@push('scripts')
<script>
$(document).ready(function() {
    $('#dataTableRT').DataTable();
});
</script>
@endpush
@endsection