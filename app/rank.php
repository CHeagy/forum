<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rank extends Model
{
    public function user() {
    	return $this->hasMany('App\User', 'rank', 'id');
    }
}
