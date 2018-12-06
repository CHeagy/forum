@extends('layouts.app')


@section('content')
<div class="container">

	<div class="row nav">
		<div class="col-10">
		<a href="/">Home</a> / <a href="/category/{{ $forum->parent_cat }}">{{ $forum->category->name }}</a> / {{ $forum->name }}
		</div>
		<div class="col-2 float-right"><a href="/forum/{{$forum->id}}/new"><button class="btn btn-outline-primary">New Post</button></a></div>
	</div>


		@foreach ($forum->posts as $post)
		<div class="row post-row rounded">
				<div class="col-2"></div>
				<div class="col-5 post text-left"><a href="/post/{{$post->id}}">{{$post->title}}</a><br /><small>by <a href="/user/{{$post->author_id}}">{{$post->author->name}}</a> | {{ count($post->children) }}  replies</small></div>
				<div class="col-3 author text-right"><small>Last updated by <a href="/user/{{$post->last_author_id}}">{{$post->last_author->name}}</a><br />on {{ date('M jS, Y @ H:i', strtotime($post->thread_updated_at)) }}</small></div>
				<div class="col-2"></div>
		</div>
		@endforeach

</div>
@endsection