<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{

    protected $fillable = ['salon_id', 'chair_name','desc'];


    public function getSalon()
    {

        return $this->hasOne('App\User', 'id', 'salon_id');

    }

}
