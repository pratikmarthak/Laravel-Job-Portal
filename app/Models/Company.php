<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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
}
