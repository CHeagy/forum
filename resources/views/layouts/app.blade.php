<!doctype html>
<html lang="en">
	<head>
		<title>Forum</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<style>
			.navbar {
				margin-bottom: 1.5rem;
			}

			body {
				padding-bottom: 1.5rem;
			}

			.manipulator_btn {
				margin: 1px;
			}

			.nav {
				padding-bottom: 1.5rem;
				border-left: 1px solid #ddd;
				border-top: 1px solid #ddd;
				border-right: 1px solid #ddd;
				padding-top: 0.5rem;
			}

			.post-list {
				border-left: 1px solid #ddd;
				border-bottom: 1px solid #ddd;
				border-right: 1px solid #ddd;
				background: #fff;

				padding-top: 10px;
				padding-bottom: 10px;
				
			}

			.post {
				border-left: 1px solid #ddd;
				border-bottom: 1px solid #ddd;
				padding-top: 5px;
				padding-bottom: 5px;
				border-radius: 0px 0px 0px 3px;
			}

			.author {
				border-right: 1px solid #ddd;
				border-bottom: 1px solid #ddd;
				padding-top: 5px;
				padding-bottom: 5px;
				border-radius: 0px 0px 3px 0px;
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
		<nav class="navbar navbar-expand-md navbar-dark bg-dark">
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="/">Home</a>
					</li>
					@if (Auth::check())
					<li class="nav-item">
						<a class="nav-link" href="/account">{{Auth::user()->name}}</a>
					</li>
					@endif
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
	<script type="text/javascript">
	function confirmDelete() {
		document.activeElement.blur();
		return confirm("Are you sure you want to delete this post?");
	}
	</script>
</html>
