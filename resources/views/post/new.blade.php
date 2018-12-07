@extends('layouts.app')

@section('content')
<div class="container">

	
		<div class="row post-row rounded">
				<div class="col-3"></div>
				<div class="col-6">
					<form action="/forum/{{ $forum->id }}/new" method="POST">
						@csrf

						<input type="hidden" name="forum" value="{{ $forum->id }}">
						<br />
						{{$forum->name}}
						<br /><br />
						<input type="text" name="title" class="form-control" placeholder="Title" autofocus required>
						<br />
						<textarea name="text" class="form-control" required placeholder="Message"></textarea>
						<br />
						<div class="float-left">
							<input type="submit" class="btn btn-outline-primary" value="Submit" />
							@if (Auth::user()->rank >= 3)
							<input type="checkbox" name="sticky" id="sticky"> <label for="sticky">Sticky</label>
							<input type="checkbox" name="lock" id="lock"> <label for="lock">Lock</label>
							@endif
						</div>
					</form>
					<div class="float-right"><a href="/forum/{{$forum->id}}"><button class="btn btn-outline-danger">Cancel</button></a></div>
				</div>
				<div class="col-3"></div>
		</div>

</div>
@endsection