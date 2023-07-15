<?php

namespace Database\Seeders\Geo;

use App\Models\Geo\Country;
use Illuminate\Database\Eloquent\Model;
use Nevadskiy\Geonames\Seeders\CountrySeeder as Seeder;

class CountrySeeder extends Seeder
{
    protected $loadingCountriesCodes = ['UA'];

    /**
     * {@inheritdoc}
     */
    protected static $model = Country::class;

    /**
     * Get the new continent model instance.
     */
    protected function newContinentModel(): Model
    {
        return ContinentSeeder::newModel();
    }

    protected function filter(array $record): bool
    {
        if (!isset($this->countryInfo[$record['geonameid']])) {
            return false;
        }

        $countryInfo = $this->countryInfo[$record['geonameid']];

        if (!in_array($countryInfo['ISO'], $this->loadingCountriesCodes)) {
            return false;
        }

        return true;
    }
}
