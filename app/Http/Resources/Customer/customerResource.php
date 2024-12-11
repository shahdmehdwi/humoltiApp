<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class customerResource extends JsonResource
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
                'name' =>$this->name,
                'email' =>$this->email,
                'imageUrl'=> $this->imageUrl,
                'phoneNumber'=> $this->phoneNumber,
                'SecondaryPhoneNumber'=> $this->secondaryNumber,
                'location'=> $this->location,
            ];
    }
}

}
