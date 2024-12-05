<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Kecamatan extends Authenticatable
{
    use Notifiable;

    protected $table = 'kecamatans';
    protected $guard = 'kecamatan';

    protected $fillable = [
        'nama',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function rws()
    {
        return $this->hasMany(Rw::class);
    }
}