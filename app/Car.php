<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    const MANUAL_GEAR = 'manual';
    const AUTOMATIC_GEAR = 'automatic';

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    //protected $touches = [''];
    public $timestamps = false;

    public function car_images()
    {
        return $this->hasMany(CarImage::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class)->withTimestamps();
    }
}
