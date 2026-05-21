<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_olympic_sport',
        'origin_country',
        'first_played_date',
    ];
}
