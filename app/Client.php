<?php

namespace App;

class Client extends User
{
    const USER_ID  ='user_id';

    public $timestamps = false;
    protected $fillable = [Client::USER_ID];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
