<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use Sluggable;
    protected $fillable = [
        'user_id',
        'logo',
        'banner',
        'name',
        'slug',
        'bio',
        'vision',
        'industry_type_id',
        'organization_type_id',
        'team_size_id',
        'establishement_date',
        'website',
        'email',
        'phone',
        'country',
        'state',
        'city',
        'address',
        'map_link',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }
    public function industryType():BelongsTo{
        return $this->belongsTo(IndustryType::class,'industry_type_id','id');
    }
    public function organizationType():BelongsTo{
        return $this->belongsTo(Organization::class,'organization_type_id','id');
    }
    public function teamSize():BelongsTo{
        return $this->belongsTo(TeamSize::class,'team_size_id','id');
    }
    public function companyCountry():BelongsTo{
        return $this->belongsTo(Country::class,'country','id');
    }
    public function companyState():BelongsTo{
        return $this->belongsTo(State::class,'state','id');
    }
    public function companyCity():BelongsTo{
        return $this->belongsTo(City::class,'city','id');
    }
}
