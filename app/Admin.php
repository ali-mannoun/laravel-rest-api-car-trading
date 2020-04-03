<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    const USER_ID = 'user_id';

    public $timestamps = false;
    protected $fillable = [Admin::USER_ID,];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
