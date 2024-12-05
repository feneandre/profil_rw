@extends('rt.layout')

@section('title', 'Edit Data Kontak RT')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Kontak RT</h4>
                <form action="{{ route('rt.kontak.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Ketua RT</label>
                        <input type="text" name="nama_ketua" class="form-control" value="{{ $kontak->nama_ketua }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" class="form-control" value="{{ $kontak->nomor_telepon }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection