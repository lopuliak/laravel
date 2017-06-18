<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function parent()
    {
        return $this->belongsTo('App\Category', 'pid');
    }
    public function children()
    {
        return $this->hasMany('App\Category', 'pid');
    }
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
    public function latestPost()
    {
      return $this->hasOne('App\Article')->latest();
    }
    public function categories() {
        return $this->belongsTo('App\Category');
    }
}
