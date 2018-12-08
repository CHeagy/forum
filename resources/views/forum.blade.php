@extends('layouts.app')


@section('content')
<div class="container">

	<div class="row nav rounded-top border-info">
		<div class="col-10">
		<a href="/">Home</a> / <a href="/category/{{ $forum->parent_cat }}">{{ $forum->category->name }}</a> / {{ $forum->name }}
		</div>
		<div class="col-2 float-right">
			@if (Auth::check())
			<a href="/forum/{{$forum->id}}/new"><button class="btn btn-outline-primary">New Post</button></a>
			@endif
		</div>
	</div>


		@foreach ($forum->posts as $post)
		@if($post->stickied)
		<div class="row post-row rounded-bottom">
				<div class="col-2"></div>
				<div class="col-5 post alert-success text-left">
					@if (Auth::check() && Auth::user()->rank >= 3)
					<a onclick="return confirmDelete()" href="/post/{{$post->id}}/delete" class="manipulator_btn btn btn-outline-danger">X</a> 

					@if($post->locked)
					<a href="/post/{{$post->id}}/lock" class="manipulator_btn btn btn-secondary">L</a>
					@else
					<a href="/post/{{$post->id}}/lock" class="manipulator_btn btn btn-outline-secondary">L</a>
					@endif

					<a href="/post/{{$post->id}}/sticky" class="manipulator_btn btn btn-success">S</a>
					@endif
					<a href="/post/{{$post->id}}">{{$post->title}}</a>

					@if($post->locked)
					&#128274;
					@endif
					<br /><small>by <a href="/user/{{ $post->author->id }}"><span style="color: #{{$post->author->display_rank->color}}">{{ $post->author->name }}</span></a> | {{ count($post->children) }}  replies</small></div>
				<div class="col-3 author alert-success text-right"><small>Last updated by <a href="/user/{{ $post->last_author->id }}"><span style="color: #{{$post->last_author->display_rank->color}}">{{ $post->last_author->name }}</span></a><br />on {{ date('M jS, Y @ H:i', strtotime($post->thread_updated_at)) }}</small></div>
				<div class="col-2"></div>
		</div>
		@endif
		@endforeach

		@foreach ($forum->posts as $post)
		@if(!$post->stickied)
		<div class="row post-row rounded-bottom">
				<div class="col-2"></div>
				<div class="col-5 post border-info text-left">
					@if (Auth::check() && Auth::user()->rank >= 3)
					<a onclick="return confirmDelete()" href="/post/{{$post->id}}/delete" class="manipulator_btn btn btn-outline-danger">X</a> 
					
					@if($post->locked)
					<a href="/post/{{$post->id}}/lock" class="manipulator_btn btn btn-secondary">L</a>
					@else
					<a href="/post/{{$post->id}}/lock" class="manipulator_btn btn btn-outline-secondary">L</a>
					@endif

					<a href="/post/{{$post->id}}/sticky" class="manipulator_btn btn btn-outline-success">S</a>
					@endif
					<a href="/post/{{$post->id}}">{{$post->title}}</a>

					@if($post->locked)
					&#128274;
					@endif
					<br /><small>by <a href="/user/{{ $post->author->id }}"><span style="color: #{{$post->author->display_rank->color}}">{{ $post->author->name }}</span></a> | {{ count($post->children) }}  replies</small></div>
				<div class="col-3 author border-info text-right"><small>Last updated by <a href="/user/{{ $post->last_author->id }}"><span style="color: #{{$post->last_author->display_rank->color}}">{{ $post->last_author->name }}</span></a><br />on {{ date('M jS, Y @ H:i', strtotime($post->thread_updated_at)) }}</small></div>
				<div class="col-2"></div>
		</div>
		@endif
		@endforeach

</div>
@endsection