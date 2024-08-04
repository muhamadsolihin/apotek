<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataBansosItem extends Model
{
    protected $fillable = [
        'no_kk',
        'nama_kk',
        'jenis_kelamin',
        'umur',
        'alamat',
        'desa',
        'rt',
        'rw',
        'jumlah_tanggungan',
        'pekerjaan',
        'pendapatan',
        'tanggal'
    ];
}
