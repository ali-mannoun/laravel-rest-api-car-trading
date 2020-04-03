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
    protected $touches = ['employee'];
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function car_images()
    {
        return $this->hasMany(CarImage::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class)->withTimestamps();
    }
}
