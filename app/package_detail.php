<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package_detail extends Model
{
    protected $fillable = ['name', 'limit', 'package_id'];


    public function getPackage()
    {

        return $this->hasOne('App\package', 'id', 'package_id');

    }
}
