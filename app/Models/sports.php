<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sports extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_olympic_sport',
        'origin_country',
        'first_played_date',
    ];
}
