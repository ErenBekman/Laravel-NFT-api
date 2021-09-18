<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NftResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        return [
               'id' => $this->id,
               'type' => 'Nft',
               'user_id' => auth()->id(),
               'name' => $this->name,
               'description' => $this->description,
               'price' => $this->price,
               'image' => $this->getFirstMediaUrl('images'),
               'created_at' => Carbon::parse($this->created_at)->format('d-m-Y H:i:s'),
               'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y H:i:s'),
           ];
    }
}
