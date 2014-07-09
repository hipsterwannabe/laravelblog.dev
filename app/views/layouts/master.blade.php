<!doctype html>
<html lang="en">
<head>
    <title>Laravel Project</title>
    <!-- Bootstrap css -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="/bootstrap/superherobootstrap.css">
	<!-- pulls from bottom css, then anything not in bottom file will be pulled from top -->
	<!-- Header for pages -->
		
	@yield('css')
	@yield('top-script')

</head>
<body>

	<nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Greg Vallejo</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="/">HOME</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">MENU <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="/portfolio">Portfolio</a></li>
	            <li class="divider"></li>
	            <li><a href="/resume">Resume</a></li>
	            <li class="divider"></li>
	            <li><a href="/posts">Blog</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		@if (Auth::check())
		    <!-- show user email
		    show logout -->
		    {{ Auth::user()->email }}
		    <br>
		    {{ link_to_action('PostsController@create', 'Create Post', null, array("class"=>"btn btn-success")) }}
		    
		    {{ link_to_action('HomeController@logout', 'LOGOUT', null, array("class"=>"btn btn-danger")) }}
			
		@else
		   <!--  show login link -->
		   {{ link_to_action('HomeController@showLogin', 'Login', null, array("class"=>"btn btn-default")) }}
		@endif

	</div>
	<div class="container">
		@if (Session::has('successMessage'))
    		<div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
		@endif
		@if (Session::has('errorMessage'))
    		<div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
		@endif
		<!-- could be in two divs -->
    	@yield('content')
	
	</div>
	<div>
		<br>
		<br>
		<br>
	</div>	
    <!-- jquery -->
    <!-- bootstrap js -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
</body>
</html>