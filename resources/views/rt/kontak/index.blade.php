@extends('rt.layout')

@section('title', 'Data Kontak RT')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Data Kontak RT</h4>
                    @if(!$kontak)
                    <a href="{{ route('rt.kontak.create') }}" class="btn btn-primary">Tambah Data</a>
                    @endif
                </div>
                @if($kontak)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th width="200">Nama RT</th>
                            <td>{{ $kontak->nama_rt }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ketua</th>
                            <td>{{ $kontak->nama_ketua }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>{{ $kontak->nomor_telepon }}</td>
                        </tr>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('rt.kontak.edit') }}" class="btn btn-warning">
                            <i class="ti-pencil"></i> Edit Data
                        </a>
                        <form action="{{ route('rt.kontak.destroy', $kontak->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="ti-trash"></i> Hapus Data
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <p class="mt-3">Belum ada data kontak. Silakan tambah data.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection