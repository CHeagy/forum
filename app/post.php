<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $hidden = [];

    public function forum() {
    	return $this->belongsTo('App\forum', 'parent_forum', 'id');
    }

    public function parent() {
    	return $this->belongsTo('App\post', 'parent_post', 'id');
    }

    public function children() {
    	return $this->hasMany('App\post', 'parent_post', 'id');
    }

    public function author() {
    	return $this->belongsTo('App\User', 'author_id', 'id');
    }

    public function last_author() {
        return $this->belongsTo('App\User', 'thread_updated_by', 'id');
    }

    public function editor() {
        return $this->belongsTo('App\User', 'post_updated_by', 'id');
    }
}
