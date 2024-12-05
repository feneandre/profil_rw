<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Rt extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'nomor_rt',
        'rw_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }

    public function kontak()
    {
        return $this->hasOne(KontakRt::class, 'rt_id');
    }
}