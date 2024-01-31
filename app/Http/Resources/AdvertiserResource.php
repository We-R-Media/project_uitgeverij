<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertiserResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'relatiesoort' => 'Klant',
            'relatiecode' => $this->id,
            'modifiedOn' => $this->updated_on,
            'naam' => $this->name,
            'vestigingsadres' => $this->po_box,
            'contactpersoon' => ContactResource::collection($this->whenLoaded('contacts')),
            // 'data' => parent::toArray($request),
        ];
    }
}
