<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
  protected $fillable = [
    'location', 'home_field',
  ];

  public function user(){
    $this->belongsTo('App\User');
  }
}
