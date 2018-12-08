@extends('layouts.app')


@section('content')

<div class="container">
	<div class="row nav rounded-top border-info">
		<div class="col-10">
		<a href="/">Home</a> / <a href="/category/{{ $post->forum->parent_cat }}">{{ $post->forum->category->name }}</a> / <a href="/forum/{{ $post->parent_forum }}">{{ $post->forum->name }}</a> / {{ $post->title }}
		</div>
		<div class="col-2">
			@if ($post->locked)
			<button class="btn float-right btn-outline-secondary" disabled>Locked</button>
				@if (Auth::check() && Auth::user()->rank >= 3)
				<a href="/post/{{ $post->id }}/add"><button class="btn btn-outline-primary float-right">Post Reply</button></a>
				@endif
			@else
				@if (Auth::check())
				<a href="/post/{{ $post->id }}/add"><button class="btn btn-outline-primary float-right">Post Reply</button></a>
				@endif
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-10">
			{{ $post->children->links() }}
			<p class="h4">{{ $post->title }}</p>
		</div>
		<div class="col-2 float-right"></div>
	</div>

	@if (!isset($_GET['page']) || $_GET['page'] == 1)
	<div class="row post-list rounded-bottom border-info" id="p{{$post->id}}">
		<div class="col-2">
			<a href="/user/{{ $post->author->id }}"><span style="color: #{{$post->author->display_rank->color}}">{{ $post->author->name }}</span></a>
			<br />
			<small>Posts: {{ count($post->author->posts) }}</small>
			<br />
			<small>Joined <?=date('M jS, Y', strtotime($post->author->created_at))?></small>
		</div>
		<div class="col-8">
			<small class="text-muted">Posted {{ date('M jS, Y', strtotime($post->created_at)) }}</small>
			@if ($post->created_at != $post->updated_at)
			<br /><small class="text-muted">Last modified by {{ $post->editor->name }} on {{ $post->updated_at }}</small>
			@endif
			<p>{!! nl2br(e($post->post_text)) !!}</p>
		</div>
		<div class="col-2">
			@if (Auth::check())
				@if (Auth::user()->id == $post->author_id || Auth::user()->rank >= 3)
					@if(Auth::user()->rank >= 3)
					<a href="/post/{{$post->id}}/sticky"><button class="manipulator_btn btn {{ ($post->stickied) ? "btn-success" : "btn-outline-success" }} float-right">S</button></a>
					<a href="/post/{{$post->id}}/lock"><button class="manipulator_btn btn {{ ($post->locked) ? "btn-secondary" : "btn-outline-secondary" }} float-right">L</button></a>
					@endif
					<a href="/post/{{$post->id}}/edit"><button class="manipulator_btn btn btn-outline-primary float-right">E</button></a> 
					<a onclick="return confirmDelete()" href="/post/{{$post->id}}/delete"><button class="manipulator_btn btn btn-outline-danger float-right">X</button></a>
				@endif
			@endif
		</div>
	</div>
	@endif

	@foreach ($post->children as $child)
	<div class="row post-list rounded-bottom border-info" id="p{{$child->id}}">
		<hr />
		<div class="col-2">
			<a href="/user/{{ $child->author->id }}"><span style="color: #{{$child->author->display_rank->color}}">{{ $child->author->name }}</span></a>
			<br />
			<small>Posts: {{ count($child->author->posts) }}</small>
			<br />
			<small>Joined <?=date('M jS, Y', strtotime($child->author->created_at))?></small>
		</div>
		<div class="col-8">

			<small class="text-muted">Posted {{ date('M jS, Y', strtotime($child->created_at)) }}</small>
			@if ($child->created_at != $child->updated_at)
			<br /><small class="text-muted">Last modified by {{ $child->editor->name }} on {{ $child->updated_at }}</small>
			@endif

			<p>{!! nl2br(e($child->post_text)) !!}</p>
		</div>
		<div class="col-2">
			@if (Auth::check())
				@if ((Auth::user()->id == $child->author_id && (!$child->parent->locked)) || Auth::user()->rank >= 3)
					<a href="/post/{{$child->id}}/edit"><button class="manipulator_btn btn btn-outline-primary float-right">E</button></a> 
					<a onclick="return confirmDelete()" href="/post/{{$child->id}}/delete"><button class="manipulator_btn btn btn-outline-danger float-right">X</button></a>
				@endif
			@endif
		</div>
	</div>
	@endforeach

</div>
@endsection


