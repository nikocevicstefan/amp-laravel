<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'alpha2' => $this->alpha2,
            'alpha3' => $this->alpha3,
            'created_at' => $this->created_at->format('d-m-Y H:i:s')
        ];
    }
}
