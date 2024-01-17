<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',  // The ID of the user associated with the log
        'action',   // A description of the action
        'timestamp', // The timestamp when the action occurred
        // Add any other fields you need for your log entries
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

