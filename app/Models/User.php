<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    const ROLE_USER = 1;
    const ROLE_ADMIN = 10;
    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'tel', 'email', 'password','face'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function posts() {
        return $this->hasMany(Comment::class);
    }

    public function setUserName($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function setLastName($value)
    {
        $this->attributes['lastname'] = strtolower($value);
    }

    public function setTel($value)
    {
        $this->attributes['tel'] = strtolower($value);
    }

    public function setEmail($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
}
