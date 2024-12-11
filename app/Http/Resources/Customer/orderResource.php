<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class orderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        {

                return [
                    'id' => $this->id,
                    'customerId' => $this->customerId,
                    'driverId' => $this->driverId,
                    'categorytId' => $this->categorytId,
                    'payment' => $this->payment->name,
                    'pickUpLocation' => $this->pickUpLocation,
                    'deliveryLocation' => $this->deliveryLocation,
                    'distance' => $this->distance,
                    'price' => $this->price,
            ];
    }
}
}

