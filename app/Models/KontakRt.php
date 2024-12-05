<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakRt extends Model
{
    protected $table = 'kontak_rt';
    protected $fillable = ['nama_rt', 'nama_ketua', 'nomor_telepon', 'rt_id'];

    public function rt()
    {
        return $this->belongsTo(Rt::class, 'rt_id');
    }
}