<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'places';
    protected $fillable = [
        'prefecture',
        'name',
        'api_id',
        'display_top',
    ];

}
