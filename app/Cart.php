<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'service_id', 'count'];


    public function getUser()
    {

        return $this->hasOne('App\User', 'id', 'salon_id');

    }

    public function getProduct()
    {

        return $this->hasOne('App\Product', 'id', 'product_id');

    }

    public function getService()
    {

        return $this->hasOne('App\Service', 'id', 'product_id');

    }
}
