<?php

namespace App\Traits;

trait Searchable{
    function search($query,array $searchableFields){
        return $query->where(function($subquery) use($searchableFields){
            foreach($searchableFields as $field){
                $subquery->orWhere($field,'LIKE','%'.request('search').'%');
            }
        });
    }
}
