<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "u_id"=> $this->id,
            "u_name"=> $this->name,
            "u_email"=> $this->email,
            "u_member_since"=> $this->created_at,
        ];
    }
}
