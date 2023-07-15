<?php

namespace Database\Seeders\Geo;

use App\Models\Geo\Division;
use Illuminate\Database\Eloquent\Model;
use Nevadskiy\Geonames\Seeders\DivisionSeeder as Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * {@inheritdoc}
     */
    protected static $model = Division::class;

    protected function filter(array $record): bool
    {
        if(!isset($this->countries[$record['country code']])){
            return false;
        } 
        
        return in_array($record['feature code'], $this->featureCodes, true);
    }

    /**
     * Get a new country model instance.
     */
    protected function newCountryModel(): Model
    {
        return CountrySeeder::newModel();
    }
}
