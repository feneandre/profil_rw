@extends('rw.layout')

@section('title', 'Data Kontak')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <!-- Tabel Kontak RW -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Data Kontak RW</h4>
                    <a href="{{ route('rw.kontak.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelurahan</th>
                                <th>RW</th>
                                <th>Ketua RW</th>
                                <th>No. Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kontakRw as $kontak)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kontak->nama_kelurahan }}</td>
                                <td>{{ $kontak->nama_rw }}</td>
                                <td>{{ $kontak->nama_ketua }}</td>
                                <td>{{ $kontak->nomor_telepon }}</td>
                                <td>
                                    <a href="{{ route('rw.kontak.edit', $kontak->id) }}" class="btn btn-warning btn-sm">
                                        <i class="ti-pencil"></i>
                                    </a>
                                    <form action="{{ route('rw.kontak.destroy', $kontak->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="ti-trash"></i>
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

        <!-- Tabel Kontak RT -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Kontak RT</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>RT</th>
                                <th>Ketua RT</th>
                                <th>No. Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kontakRt as $kontak)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kontak->rt->nama }}</td>
                                <td>{{ $kontak->nama_ketua }}</td>
                                <td>{{ $kontak->nomor_telepon }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection