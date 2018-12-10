@extends('layouts.app')

@section('content')
<div class="container">
	<h1>{{Auth::user()->name}}</h1>
	<h3 style="color: #{{Auth::user()->display_rank->color}}">{{Auth::user()->display_rank->name}}</h3>
	<form action="/account" method="post">
		@csrf
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<div class="row">
					<div class="col-6">
						<label for="email">Update Email address: </label>
						<input type="email" name="email" id="email" class="form-control {{ ($errors->has('email')) ? "border border-danger" : "" }}" placeholder="{{Auth::user()->email}}" value="{{(old('email')) ? old('email') : "" }}">
						<br />

						<label for="ver_email">Verify email: </label>
						<input type="email" name="email_confirmation" id="ver_email" class="form-control {{ ($errors->has('email')) ? "border border-danger" : "" }}" value="{{(old('email_confirmation')) ? old('email_confirmation') : "" }}">
						<br />
					</div>
					<div class="col-6">
						<label for="new_password">Update Password: </label>
						<input type="password" name="new_password" id="new_password" class="form-control {{ ($errors->has('new_password')) ? "border border-danger" : "" }}" placeholder="New Password">
						<br />

						<label for="ver_password">Verify password: </label>
						<input type="password" name="new_password_confirmation" id="ver_password" class="form-control {{ ($errors->has('new_password')) ? "border border-danger" : "" }}" placeholder="Password">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label for="website">Website: </label>
						<input type="text" name="website" id="website" class="form-control" placeholder="{{(Auth::user()->website) ? Auth::user()->website : "https://website.com" }}" value="{{(old('website')) ? old('website') : Auth::user()->website}}">
					</div>
					<div class="col-6">
						<label for="location">Location: </label>
						<input type="text" name="location" "id="location" class="form-control" placeholder="{{(Auth::user()->location) ? Auth::user()->location : "Somewhere, anywhere" }}" value="{{(old('location')) ? old('location') : Auth::user()->location}}">
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-12">
						<label for="old_password">Password: </label>
						<input type="password" class="form-control {{ ($errors->has('old_password')) ? "border border-danger" : "" }}" id="old_password" name="old_password" placeholder="Password">
						<br />
						<input type="submit" class="form-control btn btn-primary" value="Update">
						@if ($errors->any())
						<br />
						<div class="alert alert-danger">
							<ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="col-2"></div>
		</div>
	</form>
</div>	
@endsection