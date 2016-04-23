@extends('layout.template')

@section('content')
	<head>
 
  <style>
  body {
      position: relative; 
  }
  #section1 {padding-top:50px;height:500px;color: #101010; background-color: #61abd8;}
  #section2 {padding-top:50px;height:500px;color: #101010; background-color: #f6f6f6;}
  #section3 {padding-top:50px;height:500px;color: #101010; background-color: #61abd8;}
  #section41 {padding-top:50px;height:500px;color: #101010; background-color: #f6f6f6;}
  #section42 {padding-top:50px;height:500px;color: #101010; background-color:#61abd8;}
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
          <li><a href="#section3">Adoption</a></li>
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
  <div class="container">
  <h2>Daftar User</h2>
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>City</th>
        <th>Country</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Faiz</td>
        <td>Adit</td>
        <td>36</td>
        <td>Papua</td>
        <td>Indonesia</td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
  
</div>
<div id="section3" class="container-fluid">
  <h1 class="text-center">ADOPTION</h1>
  <p>Datar -----------</p>
  </div>
<div id="section41" class="container-fluid">
  <h1 class="text-center">LIST NEWS</h1>
  <p>List semua news</p>

</div>
<div id="section42" class="container-fluid">
  <h1 class="text-center">CREATE NEWS</h1>
  <p>Membuat news baru</p>
  @include('common.error')
            {!! Form::open(array('url'=>'/admin/news/new','method'=>'POST', 'files'=>true)) !!}
            {!! csrf_field() !!}
            <div class="form-inline">
               <div class="form-group">
                  <label class="in-form" for="title" style="display:block;">Title</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
               </div>
               <div class="form-group">
                  <label class="in-form" for="photo"  style="display:block;">Photo</label>
                  {!! Form::file('picture',['id'=>'photo','class'=>'form-control']) !!}
               </div>
               <div class="form-group">
                  <label class="in-form" for="content"  style="display:block;">Content</label>
                  <textarea class="form-control" name="content" id="content" placeholder="Lorem ipsum dolor sit amet"></textarea>
               </div>
            </div>
            <div class="form-group">
               <button type="submit" class="register-button btn btn-success">Search</button>
            </div>
         </form>
  </div>

</body>
@endsection