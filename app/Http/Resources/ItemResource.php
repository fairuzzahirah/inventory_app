<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'code'        => $this->code,
            'status'      => $this->status,
            'description' => $this->description,

            'category_id' => $this->category_id,
            'unit_id'     => $this->unit_id,

            'category' => new CategoryResource($this->whenLoaded('category')),
            'unit'     => new UnitResource($this->whenLoaded('unit')),
            
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

