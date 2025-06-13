<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function experience():BelongsTo{
        return $this->belongsTo(Experience::class,'experience_id','id');
    }

    public function experiences():HasMany{
        return $this->hasMany(CandidateExperience::class,'candidate_id','id')->orderBy('id','desc');
    }

    public function educations():HasMany{
        return $this->hasMany(CandidateEducation::class,'candidate_id','id')->orderBy('id','desc');
    }

    public function profession():BelongsTo{
        return $this->belongsTo(Profession::class,'profession_id','id');
    }

    public function candidateCountry():BelongsTo{
        return $this->belongsTo(Country::class,'country','id');
    }
    public function candidateState():BelongsTo{
        return $this->belongsTo(State::class,'state','id');
    }
    public function candidateCity():BelongsTo{
        return $this->belongsTo(City::class,'city','id');
    }
}
