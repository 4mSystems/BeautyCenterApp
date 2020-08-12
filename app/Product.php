<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'desc', 'main_image', 'price_after','price_before','cat_id','salon_id'];

    public function getCategory()
    {

        return $this->hasOne('App\Category', 'id', 'cat_id');

    }

    public function getSalon()
    {

        return $this->hasOne('App\User', 'id', 'salon_id');

    }

}
