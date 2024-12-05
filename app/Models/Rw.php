<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Rw extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'nomor_rw',
        'kecamatan_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kontak()
    {
        return $this->hasOne(KontakRw::class, 'rw_id');
    }

    public function rts()
    {
        return $this->hasMany(Rt::class);
    }
}