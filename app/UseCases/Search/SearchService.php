<?php

namespace App\UseCases\Search;

use App\Http\Requests\GeoSearchRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Geo\City;
use App\Models\Geo\Country;
use App\Models\Geo\Division;
use MeiliSearch\Endpoints\Indexes;

class SearchService
{
    /**
     * Method geoSearchCities
     *
     * @param GeoSearchRequest $request 
     * @param Division $division 
     *
     * @return void
     */
    public function geoSearchCities(GeoSearchRequest $request, Division $division)
    {
        $distance = $request->radius * 1000; //Radius in meters
        $cities = City::search('', function (Indexes $meiliSearch, $query, $options) use ($request, $distance) {
            return $meiliSearch->search(
                $request->search,
                [
                    'filter' =>  '_geoRadius(' . $request->latitude . ', ' . $request->longitude . ', ' . $distance . ')'
                ]
            );
        })->where('division_id', $division->id)->get();

        return $cities;
    }

    /**
     * Method searchCities
     *
     * @param $search $search 
     * @param Division $division 
     *
     * @return void
     */
    public function searchCities(SearchRequest $request, Division $division)
    {
        if ($request->search) {
            return City::search($request->search)->where('division_id', $division->id)->get();
        }
        return City::where('division_id', $division->id)->get();
    }

    /**
     * Method searchDivisions
     *
     * @param SearchRequest 
     * @param Country $country 
     *
     * @return void
     */
    public function searchDivisions(SearchRequest $request, Country $country)
    {
        if ($request->search) {
            return Division::search($request->search)->where('country_id', $country->id)->get();
        }
        return Division::where('country_id', $country->id)->get();
    }
}
