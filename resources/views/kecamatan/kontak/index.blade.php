@extends('kecamatan.layout')

@section('title', 'Data Kontak')

@section('content')
<!-- Filter Card -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Filter Data</h4>
                <form method="GET" action="{{ route('kecamatan.kontak.index') }}">
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <div class="form-group mb-0">
                                <label>Kelurahan</label>
                                <select class="form-control" name="kelurahan" id="kelurahan">
                                    <option value="">Semua Kelurahan</option>
                                    @foreach($kelurahan as $kel)
                                        <option value="{{ $kel }}" {{ request('kelurahan') == $kel ? 'selected' : '' }}>
                                            {{ $kel }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-0">
                                <label>RW</label>
                                <select class="form-control" name="rw" id="rw">
                                    <option value="">Semua RW</option>
                                    @if(request('kelurahan') && isset($rws))
                                        @foreach($rws as $rw)
                                            <option value="{{ $rw }}" {{ request('rw') == $rw ? 'selected' : '' }}>
                                                {{ $rw }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-0 d-flex">
                                <button type="submit" class="btn btn-primary mr-2">Cari Data</button>
                                <a href="{{ route('kecamatan.kontak.index') }}" class="btn btn-light">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Data Kontak RW -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0">Data Kontak RW</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 25%">Kelurahan</th>
                                <th style="width: 20%">RW</th>
                                <th style="width: 25%">Ketua RW</th>
                                <th style="width: 25%">No. Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kontakRw as $kontak)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kontak->nama_kelurahan }}</td>
                                <td>{{ $kontak->nama_rw }}</td>
                                <td>{{ $kontak->nama_ketua }}</td>
                                <td>{{ $kontak->nomor_telepon }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Data Kontak RT -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0">Data Kontak RT</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 25%">RW</th>
                                <th style="width: 20%">RT</th>
                                <th style="width: 25%">Ketua RT</th>
                                <th style="width: 25%">No. Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kontakRt as $kontak)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kontak->rt->rw->nama }}</td>
                                <td>{{ $kontak->rt->nama }}</td>
                                <td>{{ $kontak->nama_ketua }}</td>
                                <td>{{ $kontak->nomor_telepon }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#kelurahan').change(function() {
        var kelurahan = $(this).val();
        if(kelurahan) {
            $.ajax({
                url: '{{ route("kecamatan.kontak.getRw", "") }}/' + kelurahan,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#rw').empty();
                    $('#rw').append('<option value="">Semua RW</option>');
                    $.each(data, function(key, value) {
                        $('#rw').append('<option value="'+ value +'">'+ value +'</option>');
                    });
                }
            });
        } else {
            $('#rw').empty();
            $('#rw').append('<option value="">Semua RW</option>');
        }
    });
});
</script>
@endpush
