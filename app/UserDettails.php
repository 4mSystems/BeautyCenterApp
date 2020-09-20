<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDettails extends Model
{
    protected $fillable = [
        'facebook', 
        'twitter',
        'instgram',
        'whatsapp', 
        'start_working', 
        'end_working',
        'user_id',

    ];

    public function getUser()
    {

        return $this->hasOne('App\User', 'id', 'user_id');

    }
}
