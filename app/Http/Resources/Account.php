<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Account extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
/*        return [
            'id' => $this->id,
            'user_name' => $this->user_name,
            'email' => $this->email,
        ];*/

        return parent::toArray($request);
    }
}
