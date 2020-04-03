<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    public $timestamps = false;

    const REGULAR_USER = 'client';
    const ADMIN_USER = 'admin';
    const EMPLOYEE_USER = 'employee';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
