<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelahiranItem extends Model
{
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'alamat_lengkap',
        'agama',
        'pekerjaan',
        'nama_ayah',
        'nama_ibu',
        'anak_ke',
        'type',
        'status',
        'nik_pengaju',
        'orgtua_pengaju',
        'status',
        'nama_instansi',
        'kepentingan',
        'tempat_lahir_pengaju',
        'tanggal_lahir_pengaju',
        'pekerjaan_pengaju',
        'jenis_kelamin',
        'status_perkawinan',
        'tempat_wafat',
        'waktu_wafat',
        'alasan_wafat'

    ];
}
