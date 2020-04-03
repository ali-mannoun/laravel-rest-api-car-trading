<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    public function employee(){
        return $this->belongsToMany(Employee::class);
    }

    public function permissions(){
        return $this->belongsToMany(Admin::class);
    }
}
