<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelolaDataItem extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'rt',
        'agama',
        'status',
        'kewarganegaraan',
        'pendidikan',
        'pekerjaan',
        'pendapatan',
    ];

    protected $dates = ['tanggal_lahir'];
}
