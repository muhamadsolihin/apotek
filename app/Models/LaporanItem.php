<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanItem extends Model
{
    protected $fillable = ['nama_obat', 'jenis_obat', 'jumlah_stok', 'expired_Date'];
}
