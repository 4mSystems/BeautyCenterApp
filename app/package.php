<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    protected $fillable = ['name', 'price', 'period', 'desc'];
}
