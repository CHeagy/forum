<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $hidden = [];

    public function forums() {
    	return $this->hasMany('App\forum', 'parent_cat');
    }
}
