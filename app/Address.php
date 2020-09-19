<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //government
// region
// piece
// street
// house_number
// boulevard
protected $fillable = ['user_id', 'government', 'region', 'piece','street','house_number','boulevard'];


public function getUser()
{
   
    return $this->hasOne('App\User', 'id', 'user_id');

}
}
