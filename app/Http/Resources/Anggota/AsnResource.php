<?php

namespace App\Http\Resources\Anggota;

use Illuminate\Http\Resources\Json\JsonResource;

class AsnResource extends JsonResource
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
            'id' => $this->id,
            'nip' => $this->nip,
            'username' => $this->username,
            'email' => $this->email,
        ];
    }
}
