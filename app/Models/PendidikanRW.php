<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendidikanRw extends Model
{
    protected $table = 'pendidikan_rw';
    
    protected $fillable = [
        'no_surat',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'periode',
        'tahun',
        'nama_pengisi',
        'pekerjaan',
        'jabatan',
        'tanggal_input',
        'waktu_input',
        'rw_id'
    ];

    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
}
