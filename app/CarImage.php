<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    protected $fillable = [
        'image_url','car_id',
    ];

    protected $hidden = [
        'car_id',
    ];


    public $timestamps = false;
    //
    public function car(){
        return $this->belongsTo(Car::class);
    }
}
