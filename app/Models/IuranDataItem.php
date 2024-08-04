<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IuranDataItem extends Model
{
    protected $fillable = [
        'nama',
        'nominal',
        'tanggal',
        'type',
    ];

    protected $dates = ['tanggal'];
}
