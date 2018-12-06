<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum extends Model
{
    protected $hidden = [];

    public function posts() {
    	return $this->hasMany('App\post', 'parent_forum');
    }

    public function category() {
    	return $this->belongsTo('App\category', 'parent_cat', 'id');
    }
}
