<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeoSearchRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\CitySearchResource;
use App\Http\Resources\DivisionSearchResource;
use App\Models\Geo\Country;
use App\Models\Geo\Division;
use App\UseCases\Search\SearchService;

class SearchController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * Method geoSearchCities
     *
     * @param GeoSearchRequest $request
     * @param $locale $locale 
     * @param Division $division 
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function geoSearchCities(GeoSearchRequest $request, $locale, Division $division)
    {
        $country = Country::where(['code' => 'UA'])->first();

        if ($division->country_id != $country->id) {
            throw new \DomainException("This division is not belong to this country.");
        }

        $cities = $this->searchService->geoSearchCities($request, $division);
        return CitySearchResource::collection($cities);
    }

    /**
     * Method searchCities
     *
     * @param SearchRequest $request 
     * @param $locale $locale 
     * @param Division $division 
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function searchCities(SearchRequest $request, $locale, Division $division)
    {
        $country = Country::where(['code' => 'UA'])->first();

        if ($division->country_id != $country->id) {
            throw new \DomainException("This division is not belong to this country.");
        }

        $cities = $this->searchService->searchCities($request, $division);
        return CitySearchResource::collection($cities);
    }

    /**
     * Method searchDivisions
     *
     * @param SearchRequest $request
     * @param $locale $locale
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function searchDivisions(SearchRequest $request, $locale)
    {
        $country = Country::where(['code' => 'UA'])->first();
        $divisions = $this->searchService->searchDivisions($request, $country);
        return DivisionSearchResource::collection($divisions);
    }
}
