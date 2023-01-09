<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class AdvertResource extends JsonResource
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
            'name' => $this->name,
            'from' => $this->from,
            'to' => $this->to,
            'total_budget' => $this->total_budget,
            'daily_budget' => $this->daily_budget,
            'creative_upload' => $this->creative_upload,
        ];
    }
}