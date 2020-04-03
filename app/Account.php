<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Account extends Model
{
    //
    const VERIFIED_ACCOUNT = 'verified';
    const UNVERIFIED_ACCOUNT = 'unverified';

    const UESR_ID = 'user_id';
    const USER_NAME = 'user_name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const GOOGLE_ACCOUNT = 'google_account';
    const FACEBOOK_ACCOUNT = 'facebook_account';
    const REMEMBER_ME = 'remember_me';
    const VERIFICATION_TOKEN = 'verification_token';

    protected $fillable = [
        Account::USER_NAME, Account::EMAIL, Account::PASSWORD
        , Account::GOOGLE_ACCOUNT, Account::FACEBOOK_ACCOUNT, Account::REMEMBER_ME, Account::UESR_ID, Account::VERIFICATION_TOKEN,
    ];


    public static function generateVerificationCode()
    {
        return Str::random(40);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
