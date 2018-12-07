<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(post $post)
    {
        $post->children = \App\post::where('parent_post', $post->id)->paginate(15);
        return view('post', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $post = new post;
        $post->author_id = Auth::user()->id;
        $post->parent_post = $request->post_id;
        $post->post_text = $request->text;
        $post->save();

        $old_post = post::findOrFail($request->post_id);
        $old_post->timestamps = false;
        $old_post->thread_updated_at = date('Y-m-d H:i:s');
        $old_post->thread_updated_by = Auth::user()->id;
        $old_post->updated_at = $old_post->updated_at;
        $old_post->save();
        $old_post->timestamps = true;
        $page = intval(ceil(count($old_post->children)/15));

        return redirect('/post/' . $request->post_id . '?page=' . $page . '#p' . $post->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        if (!Auth::check())
            return redirect(route('login'));

        if(($post->locked) && !(Auth::user()->rank >= 3))
            return back();

        return view('post.add', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
}
