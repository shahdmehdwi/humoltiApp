<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class advertisementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'id' =>$this->id,
            'title' =>$this->title,
            'description' =>$this->description,
            'price' =>$this->price,
            'priceNow' =>$this->priceNow,
            'discount' =>$this->discount,
            'imageUrl'=> $this->imageUrl,
        ];   
     }
}

