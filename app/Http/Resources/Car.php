<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Car extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' =>$this->id,
            'brand' =>$this->brand,
            'model' =>$this->model,
            'main_image_url' => $this->main_image_url,
            'max_speed' => $this->max_speed,
        ];
    }
}
