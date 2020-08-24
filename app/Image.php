<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image', 'product_id'
    ];

    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/uploads/product/Detailimage') . '/' . $img;
        else
            return "";
    }
}
