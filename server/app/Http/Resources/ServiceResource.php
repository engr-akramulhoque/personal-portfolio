<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use LaravelPulse\LockLink\Contrib\Traits\LockLink;

class ServiceResource extends JsonResource
{
    use LockLink;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $allServiceRoute = $request->route()->getName() === 'admin.services.all';

        return [
            'id' => $this->LockId($this->id),
            'title' => $this->title,
            'icon' => $this->icon,
            'description' => $allServiceRoute ? Str::limit($this->description, 30, '...')  : $this->description,
        ];
    }
}
