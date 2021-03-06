<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Facade;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = Hash::make($password);
    // }

    //Set Up relationshipto roles
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    /**
     * Check if the user has a role
     *
     * @param string $role
     * @return boolean
     */
    public function hasAnyRole(string $role) {
        return null !== $this->roles()->where('name', $role)->first();
    }
    /**
     * Check if the user has roles
     *
     * @param array $role
     * @return boolean
     */
    public function hasAnyRoles(array $role) {
        return null !== $this->roles()->whereIn('name', $role)->first();
    }


}
