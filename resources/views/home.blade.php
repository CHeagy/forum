@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row nav">
		<div class="col-10">Home</div>
		<div class="col-2"></div>
	</div>

	@foreach ($categories as $category)
		<div class="row post-row">
			<div class="col-2"></div>
			<div class="col-8 post-list category float-left"><a class="h5" href="/category/{{$category->id}}">{{$category->name}}</a></div>
			<div class="col-2"></div>
		</div>

			@foreach ($category->forums as $forum)
			<div class="row post-row rounded">
				<div class="col-2"></div>
				<div class="col-8 post-list float-left"><a href="/forum/{{$forum->id}}">{{$forum->name}}</a></div>
				<div class="col-2"></div>
			</div>
			@endforeach
	@endforeach
</div>
		
@endsection