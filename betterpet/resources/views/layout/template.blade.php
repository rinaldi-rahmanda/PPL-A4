<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BetterPet</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- insert CSS And JavaScript -->
        <link rel="stylesheet" href="css/about-style.css">
		 <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="fonts/glyphicons-halflings-regular.ttf">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

	</head>
	<body>
		<nav class="navbar custom-navbar navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			  <a href="/PPL-A4/betterpet/public/"><img src="/PPL-A4/betterpet/public/image/logo.png" width="150" height="60"></a>
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
        
         
         <hr class="hrr">
    <div class="footer">
        <div class="container-fluid text-center">
            Connect with us <br>
            <div class="sosial">
                <a href="#"><img src="/PPL-A4/betterpet/public/image/facebook.png" ></a>
                <a href="#"><img src="/PPL-A4/betterpet/public/image/twitter.png" ></a>
                <a href="#"><img src="/PPL-A4/betterpet/public/image/instagram.png" ></a>
                <a href="#"><img src="/PPL-A4/betterpet/public/image/google-plus.png" ></a>
            </div>
            <br>
            <p>&copy; PPL A04, Inc</p>
        </div>
    </div>

    </body>
</html>