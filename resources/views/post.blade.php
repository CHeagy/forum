@extends('layouts.app')


@section('content')

<div class="container">
	<div class="row nav">
		<div class="col-10">
		<a href="/">Home</a> / <a href="/category/{{ $post->forum->parent_cat }}">{{ $post->forum->category->name }}</a> / <a href="/forum/{{ $post->parent_forum }}">{{ $post->forum->name }}</a> / {{ $post->title }}
		</div>
		<div class="col-2"><a href="/post/{{ $post->id }}/add"><button class="btn btn-outline-primary">Post Reply</button></a></div>
	</div>

	<div class="row">
		<div class="col-10"><p class="h4">{{ $post->title }}</p></div>
		<div class="col-2 float-right"></div>
	</div>

	<div class="row post-list rounded-bottom">
		<div class="col-2">
			<a href="/user/{{ $post->author->id }}">{{ $post->author->name }}</a>
			<br />
			<small>Joined <?=date('M jS, Y', strtotime($post->author->created_at))?></small>
		</div>
		<div class="col-9">
			<small class="text-muted">Posted {{ date('M jS, Y', strtotime($post->created_at)) }}</small>
			@if ($post->created_at != $post->updated_at)
			<br /><small class="text-muted">Last modified by {{ $post->author->name }} on {{ $post->updated_at }}</small>
			@endif
			<p>{{ $post->post_text }}</p>
		</div>
		<div class="col-1">
			@if (Auth::check())
				@if (Auth::user()->id == $post->author_id)
					<button class="btn btn-outline-primary">E</button><br /><br />
					<button class="btn btn-outline-danger">X</button>
				@endif
			@endif
		</div>
	</div>

	@foreach ($post->children as $child)
	<div class="row post-list rounded-bottom">
		<hr />
		<div class="col-2">
			<a href="/user/{{ $child->author->id }}">{{ $child->author->name }}</a>
			<br />
			<small>Joined <?=date('M jS, Y', strtotime($child->author->created_at))?></small>
		</div>
		<div class="col-9">

			<small class="text-muted">Posted {{ date('M jS, Y', strtotime($child->created_at)) }}</small>
			@if ($child->created_at != $child->updated_at)
			<br /><small class="text-muted">Last modified by {{ $child->author->name }} on {{ $child->updated_at }}</small>
			@endif

			<p>{{ $child->post_text }}</p>
		</div>
		<div class="col-1">
			@if (Auth::check())
				@if (Auth::user()->id == $child->author_id)
					<button class="btn btn-outline-primary">E</button><br /><br />
					<button class="btn btn-outline-danger">X</button>
				@endif
			@endif
		</div>
	</div>
	@endforeach

</div>

@endsection


