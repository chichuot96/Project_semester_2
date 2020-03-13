<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'user_name' => $this->user_name,
            'email' =>$this->email,
            'full_name'=>$this->full_name,

        ];
    }
}
