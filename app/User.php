<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'type', 'image',
        'lat',
        'lng',
        'open_from',
        'open_to',
        'status',
        'is_verfied',
        'added_by',
        'address',
        'package_id',
        'password_confirmation',
        'salon_payment_status'
    ];
    public function  getPackage(){

        return $this->hasOne('App\package','id','package_id');

    }

    public function getSalon_payment_statusAttribute($value)
    {

        if ($value == 'yes') {
            return trans('admin.yesStatus');
        } else if ($value == 'no'){
            return trans('admin.noStatus');
        }
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
