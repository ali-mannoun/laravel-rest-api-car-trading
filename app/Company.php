<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    const NAME = 'company_name';
    const DESCRIPTION = 'description';
    const BRANCH_OF = 'branch_of';
    const LOCATION = 'location';

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
