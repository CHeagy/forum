@extends('layouts.app')

@section('content')
<div class="container">

	
		<div class="row post-row rounded">
				<div class="col-3"></div>
				<div class="col-6">
					<form action="/post/{{$post->id}}/add" method="POST">
						@csrf
						<input type="hidden" name="post_id" value="{{$post->id}}" />
						<br />
						{{$post->title}}
						<br /><br />
						<textarea name="text" class="form-control"></textarea>
						<br />
						<div class="float-left"><input type="submit" class="btn btn-outline-primary" value="Submit" /></div>
					</form>
					<div class="float-right"><a href="/post/{{ $post->id }}"><button class="btn btn-outline-danger">Cancel</button></a></div>
				</div>
				<div class="col-3"></div>
		</div>

</div>
@endsection