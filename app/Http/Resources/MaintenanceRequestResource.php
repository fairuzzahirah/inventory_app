<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaintenanceRequestResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'item' => [
                'id'   => $this->item->id,
                'name' => $this->item->name,
                'code' => $this->item->code,
            ],

            'requested_by' => [
                'id'   => $this->requestedBy->id,
                'name' => $this->requestedBy->name,
                'role' => $this->requestedBy->role,
            ],

            'unit' => [
                'id'   => $this->unit->id,
                'name' => $this->unit->name,
            ],

            'priority'    => $this->priority,
            'status'      => $this->status,
            'description' => $this->description,

            'technicians' => $this->whenLoaded('technicians', function () {
                return $this->technicians->map(function ($user) {
                    return [
                        'id'   => $user->id,
                        'name' => $user->name,
                        'role' => $user->pivot->role,
                    ];
                });
            }),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
