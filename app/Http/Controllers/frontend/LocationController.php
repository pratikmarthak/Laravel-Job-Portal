<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class LocationController extends Controller
{
    /** Get all States by Country Id
     *
     * @param $countryId
     *
     */
    public function getStates(string $countryId):HttpResponse{
        $states = State::select(['id','name','country_id'])->where('country_id', $countryId)->get();
        return response($states);
    }

    /** Get all States by Country Id
     *
     * @param $stateId
     *
     */
    public function getCities(string $stateId):HttpResponse{
        $cities = City::select(['id','name','state_id','country_id'])->where('state_id', $stateId)->get();
        return response($cities);
    }
}
