<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','location','contact','email','personal_summary','facebook','twitter','linkedin','github','picture','surname'
    ];

    public function experiences(){
        return $this->hasMany('App\Experience');
    }

    public function education(){
        return $this->hasMany('App\Education');
    }

    public function awards(){
        return $this->hasMany('App\Award');
    }

    public function interests(){
        return $this->hasMany('App\Interest');
    }

    public function skills(){
        return $this->hasMany('App\Skill');
    }

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
}
