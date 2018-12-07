<?php

namespace App\Http\Controllers;

use App\post;
use App\forum;
use Illuminate\Http\Request;
use Auth;

class NewPostController extends Controller
{
    public function create(Request $request) {
    	$post = new post;
        $post->author_id = Auth::user()->id;
        $post->post_text = $request->text;
        $post->title = $request->title;
        $post->parent_forum = $request->forum;
        $post->thread_updated_at = date('Y-m-d H:i:s');
        $post->thread_updated_by = Auth::user()->id;
        if($request->sticky) {
            $post->stickied = true;
        }
        if($request->lock) {
            $post->locked = true;
        }

        $post->save();

        return redirect('/post/' . $post->id . "#p" . $post->id);
    }

    public function index(forum $forum) {
    	return view('post.new', compact('forum'));
    }
}
