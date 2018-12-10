@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<h1>{{$user->name}}</h1>
			<h3 style="color: #{{$user->display_rank->color}}">{{$user->display_rank->name}}</h3>
			<div class="row">
				<div class="col-6">
					Joined {{ date('M jS, Y', strtotime($user->created_at)) }}
				</div>
				<div class="col-6">
					Posted {{count($user->posts)}} time{{(count($user->posts) != 1) ? "s" : ""}}
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					Website: 
					@if (filter_var($user->website, FILTER_VALIDATE_URL)) 
						<a href="{{ $user->website }}" target="_blank">{{$user->website}}</a>
					@else
						{{$user->website }}
					@endif
				</div>
				<div class="col-6">
					Location: {{ $user->location }}
				</div>
			</div>
			<br />
			<hr />
			<div class="row">
				<div class="col-6"><h5>Topics</h5></div>
				<div class="col-6"><h5>Posts</h5></div>
			</div>
			<hr />
			<div class="row">
				<div class="col-6">
					@foreach (App\post::all()->where('author_id', Auth::user()->id)->sortByDesc('created_at') as $post)
						@if (!isset($post->parent))
							<div class="">
								<a href="/post/{{$post->id}}">{{$post->title}}</a><br />
								<small>{{$post->post_text}}</small>
								<hr />
							</div>
						@endif
					@endforeach
				</div>
				<div class="col-6">
					@foreach (App\post::all()->where('author_id', Auth::user()->id)->sortByDesc('created_at') as $post)
						@if (isset($post->parent))
							<div class="">
								<a href="/post/{{$post->parent->id}}">{{$post->parent->title}}</a><br />
								<small>{{$post->post_text}}</small>
								<hr />
							</div>
						@endif
					@endforeach
				</div>
		</div>
		<div class="col-3"></div>
	</div>
</div>	
@endsection