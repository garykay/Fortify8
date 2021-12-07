<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //Set Up relationshipto users
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
