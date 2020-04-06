<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    const USER_TYPE = ['client', 'admin'];
    const USER_VERIFICATION = ['unverified', 'verified'];
    const ACCOUNT_TYPE = ['default', 'facebook', 'google'];

    protected $fillable = [
        'name', 'email', 'password', 'user_type', 'verification_token',
        'user_verification', 'account_type',
    ];

    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'verified_at' => 'datetime',
    ];

    public static function generateVerificationCode()
    {
        return Str::random(40);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function user_types()
    {
        return $this->hasMany(UserType::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function getUserType()
    {

    }
}
