<?php

namespace Database\Seeders\Geo;

use App\Models\Geo\City;
use Illuminate\Database\Eloquent\Model;
use Nevadskiy\Geonames\GeonamesSource;
use Nevadskiy\Geonames\Seeders\CitySeeder as Seeder;

class CitySeeder extends Seeder
{
    public function __construct(GeonamesSource $source)
    {
        parent::__construct($source);

        $this->minPopulation = 0;
    }

    /**
     * {@inheritdoc}
     */
    protected static $model = City::class;

    /**
     * Get a new country model instance.
     */
    protected function newCountryModel(): Model
    {
        return CountrySeeder::newModel();
    }

    protected function filter(array $record): bool
    {
        if (!isset($this->countries[$record['country code']])) {
            return false;
        }
        return in_array($record['feature code'], $this->featureCodes, true);
    }


    /**
     * Get a new division model instance.
     */
    protected function newDivisionModel(): Model
    {
        return DivisionSeeder::newModel();
    }
}
