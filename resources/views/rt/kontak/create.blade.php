@extends('rt.layout')

@section('title', 'Tambah Data Kontak RT')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Kontak RT</h4>
                <form action="{{ route('rt.kontak.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Ketua RT</label>
                        <input type="text" name="nama_ketua" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection