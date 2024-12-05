@extends('rt.layout')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-graduation-cap fa-fw"></i> Data Pendidikan
            </h1>
            <div class="text-gray-600 mt-1">
                DALAM RANGKA PENCAIRAN DANA INSENTIF RT
            </div>
        </div>
        <a href="{{ route('rt.pendidikan.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Data
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-1"></i>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Data Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table"></i> Daftar Data Pendidikan
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>No Surat</th>
                            <th>Periode</th>
                            <th>Tahun</th>
                            <th>Kelurahan</th>
                            <th>Tanggal Input</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendidikan as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->no_surat }}</td>
                                <td>{{ $data->periode }}</td>
                                <td>{{ $data->tahun }}</td>
                                <td>{{ $data->kelurahan }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_input)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('rt.pendidikan.show', $data->id) }}" 
                                       class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('rt.pendidikan.edit', $data->id) }}" 
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('rt.pendidikan.destroy', $data->id) }}" 
                                          method="POST" 
                                          class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $pendidikan->links() }}
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.table th {
    text-align: center;
    vertical-align: middle;
}

.table td {
    vertical-align: middle;
}

.btn-sm {
    padding: .25rem .5rem;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}

.alert {
    margin-bottom: 1rem;
}
</style>
@endpush
@endsection