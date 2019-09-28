<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $connection = 'tenant';

    protected $fillable = [
        'name',
        'year'
    ];

}
