<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'id',
        'name',
        'state_id',
        'country_id',
        'created_at',
        'updated_at'
    ];
}
