<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BetterPet</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- insert CSS And JavaScript -->
		 <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<nav class="custom-navbar navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			  <a class="navbar-brand" href="/PPL-A4/betterpet/public/">LOGO BETTERPET</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="/PPL-A4/betterpet/public/about">About Us</a></li>
				<li><a href="/PPL-A4/betterpet/public/contact">Contact</a></li>
				<li><a href="/PPL-A4/betterpet/public/faq">FAQ</a></li>
				<li><a href="/PPL-A4/betterpet/public/news">News</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Account
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/PPL-A4/betterpet/public/register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
						<li><a href="/PPL-A4/betterpet/public/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</li>
			  </ul>
			</div>
		  </div>
		</nav>
        @yield('content')
    </body>
</html>