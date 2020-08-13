<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'date',
        'time',
        'type',
        'status',
        'service_id',
        'product_id',
        'customer_id',
        'salon_id',


    ];

    public function getSalon()
    {

        return $this->hasOne('App\User', 'id', 'salon_id');

    }

    public function getUser()
    {

        return $this->hasOne('App\User', 'id', 'customer_id');

    }

    public function getService()
    {

        return $this->hasOne('App\Service', 'id', 'service_id');

    }

    public function getProduct()
    {

        return $this->hasOne('App\Product', 'id', 'product_id');

    }

}
