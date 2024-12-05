@extends('rw.layout')

@section('title', 'Edit Kontak RW')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Kontak RW</h4>
                <form class="forms-sample" action="{{ route('rw.kontak.update', $kontak->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Kelurahan</label>
                        <select class="form-control @error('nama_kelurahan') is-invalid @enderror" 
                                name="nama_kelurahan" id="kelurahan">
                            <option value="">Pilih Kelurahan</option>
                            @foreach($kelurahan as $kel)
                                <option value="{{ $kel }}" {{ $kontak->nama_kelurahan == $kel ? 'selected' : '' }}>
                                    {{ $kel }}
                                </option>
                            @endforeach
                        </select>
                        @error('nama_kelurahan')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama RW</label>
                        <select class="form-control @error('nama_rw') is-invalid @enderror" 
                                name="nama_rw" id="rw">
                            <option value="">Pilih RW</option>
                        </select>
                        @error('nama_rw')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama Ketua RW</label>
                        <input type="text" class="form-control @error('nama_ketua') is-invalid @enderror" 
                               name="nama_ketua" value="{{ old('nama_ketua', $kontak->nama_ketua) }}">
                        @error('nama_ketua')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" 
                               name="nomor_telepon" value="{{ old('nomor_telepon', $kontak->nomor_telepon) }}">
                        @error('nomor_telepon')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{ route('rw.kontak.index') }}" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    function loadRw(kelurahan, selectedRw = '') {
        const rwSelect = $('#rw');
        
        rwSelect.empty().append('<option value="">Pilih RW</option>');
        
        if (kelurahan) {
            $.get(`/rw/get-rw/${kelurahan}`, function(data) {
                rwSelect.prop('disabled', false);
                data.forEach(function(rw) {
                    rwSelect.append(new Option(rw, rw, false, rw === selectedRw));
                });
            });
        } else {
            rwSelect.prop('disabled', true);
        }
    }

    // Load RW saat halaman pertama kali dibuka
    const selectedKelurahan = $('#kelurahan').val();
    if (selectedKelurahan) {
        loadRw(selectedKelurahan, '{{ $kontak->nama_rw }}');
    }

    // Load RW saat kelurahan berubah
    $('#kelurahan').change(function() {
        loadRw($(this).val());
    });
});
</script>
@endpush
@endsection