<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use LaravelPulse\LockLink\Contrib\Traits\LockLink;

class AboutResource extends JsonResource
{
    use LockLink;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->LockId($this->id),
            'title' => $this->title,
            'avatar' => $this->avatar,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'dob' => $this->dob,
            'bio' => $this->bio,
            'description' => $this->description,
        ];
    }
}
