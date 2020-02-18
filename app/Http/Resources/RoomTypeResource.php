<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'hotel' => [
              'id' => $this->hotel_id,
              'name' => $this->hotel->name
            ],
            'name' => $this->name,
            'number_of_beds' => $this->number_of_beds,
            'number_of_rooms' => $this->number_of_rooms,
            'number_of_bathrooms' => $this->number_of_bathrooms,
            'max_capacity' => $this->max_capacity,
            'price_per_night' => $this->price_per_night,
            'description' => $this->description,
            'media' => MediaResource::collection($this->whenLoaded('media'))
        ];
    }
}
