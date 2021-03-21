<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ideals()
    {
        return $this->hasOne('App\Ideal');
    }

    public function futures()
    {
        return $this->hasMany('App\Future');
    }

    public function index_contents()
    {
        return $this->hasOne('App\IndexContent');
    }

    public function dones()
    {
        return $this->hasMany('App\Done');
    }

    public function report_contents()
    {
        return $this->hasOne('App\ReportContent');
    }

    public function companies()
    {
        return $this->hasOne('App\Company');
    }

    public function teams()
    {
        return $this->hasOne('App\Team');
    }
}
