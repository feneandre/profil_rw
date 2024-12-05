<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakRw extends Model
{
    protected $table = 'kontak_rw';
    protected $fillable = ['nama_kelurahan', 'nama_rw', 'nama_ketua', 'nomor_telepon', 'rw_id'];

    public function rw()
    {
        return $this->belongsTo(Rw::class, 'rw_id');
    }
}
