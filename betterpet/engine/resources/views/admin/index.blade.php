@extends('layout.template')

@section('content')
	<head>
 
  <style>
  body {
      position: relative; 
  }
  #section1 {padding-top:50px;height:500px;color: #101010; background-color: #5AC2FF;}
  #section2 {padding-top:50px;height:500px;color: #101010; background-color: #f6f6f6;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  #section41 {padding-top:50px;height:500px;color: #fff; background-color: #f6f6f6;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
   background-color: #5AC2FF;
}
  
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="{{URL::to('/')}}"><img src="{{URL::to('/image/logo.png')}}" width="150" height="60"></a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#section1">Shelter</a></li>
          <li><a href="#section2">Users</a></li>
          <li><a href="#section3">Section 3</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">News<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#section41">List News</a></li>
              <li><a href="#section42">Create News</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        	<li><a> Admin</a></li>
        	<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Out</a></li>
     	</ul>

      </div>
    </div>
  </div>
</nav>    

<div id="section1" class="container-fluid">
  <h1 class="text-center">SHELTER</h1>
  <p>Dafatar penitipan hewan</p>
 
</div>
<div id="section2" class="container-fluid">
  <h1 class="text-center">USERS</h1>
  <p>Daftar User</p>
  
</div>
<div id="section3" class="container-fluid">
  <h1 class="text-center">Section 3</h1>
  <p>Datar -----------</p>
  </div>
<div id="section41" class="container-fluid">
  <h1 class="text-center">LIST NEWS</h1>
  <p>List semua news</p>
  
</div>
<div id="section42" class="container-fluid">
  <h1 class="text-center">CREATE NEWS</h1>
  <p>Membuat news baru</p>
  </div>

</body>
@endsection