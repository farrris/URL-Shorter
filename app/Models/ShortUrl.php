<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        "original_url",
        "short_url"
    ];

    public function getRouteKeyName()
    {
        return 'short_url';
    }

}
