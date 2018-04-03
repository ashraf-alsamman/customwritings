<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Datatables;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    
public function tags()
{
   return $this->belongsToMany('App\Tag'); 
}

public function posts()
{
   return $this->hasMany('App\Post', 'user_id', 'id');
}


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
