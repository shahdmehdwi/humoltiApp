<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class vechileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array

{
    {
        return  [
            'id' =>$this->id,
            'driverId' =>$this->driverId,
            'licensePlate' =>$this->licensePlate,
            'type' =>$this->type,
        ];
}
}

}
