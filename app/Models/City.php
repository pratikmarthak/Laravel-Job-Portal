<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function state():BelongsTo{
        return $this->belongsTo(State::class);
    }
    public function country():BelongsTo{
        return $this->belongsTo(Country::class);
    }
}
