<?php

namespace App\Http\Controllers;

use App\post;
use App\forum;
use Illuminate\Http\Request;
use Auth;

class ManipulatePostController extends Controller
{
    public function Store(Request $request) {

    	$post = post::findOrFail($request->post_id);
    	$post->post_text = $request->text;
    	$post->post_updated_by = Auth::user()->id;

    	if(Auth::user()->rank >= 3) {
    		if($post->stickied == true) {
	    		$post->stickied = false;
	    	} else {
	    		$post->stickied = true;
	    	}

	    	if($request->title) {
	    		$post->title = $request->title;
	    	}
    	}

    	if($post->parent_post != 0) {
    		$id = $post->parent_post;
    	} else {
    		$id = $post->id;
    	}

    	$post->save();
    	return redirect('/post/' . $id);

    }

    public function Destroy(post $post) {
    	if($post->parent_forum != NULL) {
    		$r = redirect('/forum/' . $post->parent_forum);
    		if(count($post->children) > 0) {
    			foreach($post->children as $child) {
    				$child->forceDelete();
    			}
    		}
    	} else {
    		$r = back();
    	}

    	$post->forceDelete();
    	
    	return $r;
    }

    public function Index(post $post) {
    	if (!Auth::check())
			return redirect(route('login'));

		$view = view('post.edit', compact('post'));

		if($post->author_id == Auth::user()->id) {
			$r = $view;
		} else if(Auth::user()->rank >= 3) {
			$r = $view;
		} else {
			$r = back();		
		}

    	return $r;
    }

    public function Sticky(post $post) {
    	if($post->stickied == true) {
    		$post->stickied = false;
    	} else {
    		$post->stickied = true;
    	}
    	$post->timestamps = false;
    	$post->save();
    	$post->timestamps = true;
    	return back();
    }

    public function Lock(post $post) {
    	if($post->locked == true) {
    		$post->locked = false;
    	} else {
    		$post->locked = true;
    	}
    	$post->timestamps = false;
    	$post->save();
    	$post->timestamps = true;
    	return back();
    }
}
