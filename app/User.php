<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = config('auth.user_connection');
    }


    public function UserAttr()
    {
        return $this->hasOne(UserAttr::class);
    }

    public function isSuperAdmin()
    {
        return $this->userAttr && $this->UserAttr->super_admin;
    }

    public function isActive()
    {
        return $this->userAttr && $this->UserAttr->active;
    }
}
