<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   
    protected $fillable = [
        'title', 'content'
    ];
 
    public function user ()
    {
        return $this->belongsTo('App\User');
    }
   
    public function media ()
    {
        return $this->hasMany('App\Media', 'post_id', 'id');;
    }


    public  function tags()
    {
 
        return $this->belongsToMany('App\Tag');
        
    }

}

 
