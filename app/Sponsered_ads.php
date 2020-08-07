<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsered_ads extends Model
{
    protected $fillable = [
        'payment_amount', 'payment_info', 'period', 'service_id', 'product_id', 'salon_id', 'status'


    ];

    public function getService()
    {

        return $this->hasOne('App\Service', 'id', 'service_id');

    }

    public function getProduct()
    {

        return $this->hasOne('App\Product', 'id', 'product_id');

    }

    public function getUser()
    {

        return $this->hasOne('App\User', 'id', 'salon_id');

    }
}
