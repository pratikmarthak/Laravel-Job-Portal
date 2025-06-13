<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateLanguages extends Model
{
    function language():BelongsTo{
        return $this->belongsTo(Language::class,'language_id','id');
    }
}
