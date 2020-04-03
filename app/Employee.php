<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends User
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    public function cars(){
        return $this->hasMany(Car::class);
    }
    public function histories(){
        return $this->hasMany(History::class);
    }
}
