<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        #return parent::toArray($request);
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "remember_token" => $this->remember_token,
            "error" => $this->error,
            "error_type" => $this->error_type,
        ];
    }
}
