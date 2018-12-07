@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row post-row rounded">
				<div class="col-3"></div>
				<div class="col-6">
					<form action="/post/{{$post->id}}/edit" method="POST">
						@csrf
						<input type="hidden" name="post_id" value="{{$post->id}}" />
						<br />
						@if ($post->parent_forum != 0 && Auth::user()->rank >= 3)
						<input type="text" class="form-control" name="title" value="{{$post->title}}">
						@else
						{{$post->title}}
						@endif
						<br /><br />
						<textarea name="text" class="form-control">{{$post->post_text}}</textarea>
						<br />
						<div class="float-left">
							<input type="submit" class="btn btn-outline-primary" value="Submit" />
							@if (Auth::user()->rank >= 3)
							<input type="checkbox" {{ ($post->stickied) ? "checked" : "" }} name="sticky" id="sticky"> <label for="sticky">Sticky</label>
							<input type="checkbox" {{ ($post->locked) ? "checked" : "" }} name="lock" id="lock"> <label for="lock">Lock</label>
							@endif
						</div>
					</form>
					<div class="float-right"><a href="/post/{{ $post->id }}"><button class="btn btn-outline-danger">Cancel</button></a></div>
				</div>
				<div class="col-3"></div>
		</div>

</div>
@endsection