<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DivisionSearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'country_id' => $this->country_id,
            '_geo' => [
                'lat' => $this->latitude,
                'lng' => $this->longitude
            ],
            'timezone_id' => $this->timezone_id,
            'population' => $this->population,
            'elevation' => $this->elevation,
            'dem' => $this->dem,
            'code' => $this->code,
            'feature_code' => $this->feature_code,
            'geoname_id' => $this->geoname_id
        ];
    }
}
