<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryTimes extends Model
{
    protected $fillable = ['salon_id', 'delivery_time'];


    public function getSalon()
    {

        return $this->hasOne('App\User', 'id', 'salon_id');

    }
}
