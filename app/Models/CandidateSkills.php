<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateSkills extends Model
{
    function skill():BelongsTo{
        return $this->belongsTo(Skill::class,'skill_id','id');
    }

    
}
