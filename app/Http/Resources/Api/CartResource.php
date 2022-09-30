<?php

namespace App\Http\Resources\Api;

use App\Models\CartItem;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->external_id,
            'total' => $this->total(),
            'items' => CartItemResource::collection($this->items),
        ];
    }
}
