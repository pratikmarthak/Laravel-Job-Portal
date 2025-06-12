<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'full_name',
            ]
        ];
    }
    protected $fillable = ['user_id','image','cv','full_name','title','experience_id','website','birth_date','profession_id','gender','marital_status','status','bio','country','state','city','address','phone_one','phone_two','email'];

    public function skill():HasMany{
        return $this->hasMany(CandidateSkills::class,'candidate_id','id');
    }

    public function language():HasMany{
        return $this->hasMany(CandidateLanguages::class,'candidate_id','id');
    }
}
