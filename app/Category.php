<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'type', 'image', 'salon_id'];


    public function getSalon()
    {

        return $this->hasOne('App\User', 'id', 'salon_id');

    }

    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/uploads/categories') . '/' . $img;
        else
            return "";
    }

}
