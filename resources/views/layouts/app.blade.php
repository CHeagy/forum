<!doctype html>
<html lang="en">
	<head>
		<title>Forum</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<style>
			body {
				padding-top: 4.5rem;
			}

			.nav {
				padding-bottom: 1.5rem;
			}

			.post-list {
				border-left: 1px solid #ddd;
				border-bottom: 1px solid #ddd;
				border-right: 1px solid #ddd;
				background: #fff;
				padding-top: 5px;
				padding-bottom: 5px;
				
			}

			.post {
				border-left: 1px solid #ddd;
				border-bottom: 1px solid #ddd;
				background: #fff;
				padding-top: 5px;
				padding-bottom: 5px;
			}

			.author {
				border-right: 1px solid #ddd;
				border-bottom: 1px solid #ddd;
				background: #fff;
				padding-top: 5px;
				padding-bottom: 5px;
			}

			.post-row {
				margin-bottom: 10px;
			}

			.category {
				background: #ddd;
				border-right: 1px solid #bbb;
				border-bottom: 1px solid #bbb;
				border-left: 1px solid #bbb;
			}
		</style>
	</head>

	<body>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="/account">Account</a>
					</li>
				</ul>
				<div class="mt-2 mt-md-0">
					@if (Auth::check())
						<a class="btn btn-outline-info my-2 my-sm-0" href="{{ route('logout') }}"
														 onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
						</form>
					@else
						<a class="btn btn-primary my-2 my-sm-0" href="{{ route('register') }}"><strong>Sign up</strong></a>
						<a class="btn btn-outline-light my-2 my-sm-0" href="{{ route('login') }}">Log in</a>
					@endif
				</div>
			</div>
		</nav>

		<main role="main" class="container">

		 
		 	@yield('content')

		</main>
	</body>
</html>
