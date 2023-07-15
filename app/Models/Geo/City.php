<?php

namespace App\Models\Geo;

use App\Http\Resources\CityIndexSearchResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Nevadskiy\Geonames\Translations\HasTranslations;
use Laravel\Scout\Searchable;

/**
 * @property int id
 * @property string name
 * @property int country_id
 * @property int|null division_id
 * @property float latitude
 * @property float longitude
 * @property string|null timezone_id
 * @property int|null population
 * @property int|null elevation
 * @property int|null dem
 * @property string|null feature_code
 * @property int|null geoname_id
 * @property Carbon|null created_at
 * @property Carbon|null updated_at
 */
class City extends Model
{
    use HasTranslations, Searchable;

    /**
     * Attributes that are translatable.
     *
     * @var array
     */
    protected $translatable = [
        'name',
    ];
    
    /**
     * Method toSearchableArray
     *
     * @return array
     */
    public function toSearchableArray():array
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'country_id' => $this->country_id,
            'division_id' => $this->division_id,
            '_geo' => [
                'lat' => $this->latitude,
                'lng' => $this->longitude
            ],
            'timezone_id' => $this->timezone_id,
            'population' => $this->population,
            'elevation' => $this->elevation,
            'dem' => $this->dem,
            'feature_code' => $this->feature_code,
            'geoname_id' => $this->geoname_id,
            'translations' => array_map(function ($item) {
                return [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'locale' => $item['locale']
                ];
            }, $this->translations->toArray())
        ];
    }

    /**
     * Get a relationship with a country.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get a relationship with a division.
     */
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
}
