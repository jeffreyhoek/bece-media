<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NfcTags extends Model
{
    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:00',
        'updated_at' => 'datetime:Y-m-d H:00',
    ];

    protected $fillable = ['tagValue', 'url'];
    use HasFactory;
}
