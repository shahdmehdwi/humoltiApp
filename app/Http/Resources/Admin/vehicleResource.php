<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class vehicleResource extends JsonResource
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
            'type' => $this->type,
            'licensePlate' => $this->licensePlate,

    ];
    }

    public function mapInto($resource)
    {
        // Customize the resource here if needed
        return $resource;
    }
}

