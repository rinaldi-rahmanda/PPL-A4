@extends('layout.template-about')

@section('content')
<style>
    body {
        background-color:#dfeef7;  
        height: 100%;
    }
</style>

<div class='container-fluid page-wrap'>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-sm-8" style="background-color:white; min-height: 100%; margin-top:8%;">
            <div class="col-md-2 col-sm-2" style="margin-top:5%;margin-bottom:2%;padding-left:3%;">
                <img src="http://placehold.it/200x200" alt="">
            </div>
            <div class="col-md-offset-1 col-sm-offset-1 col-md-5 col-sm-5" style="margin-top:3%;margin-bottom:2%;padding-left:4%;">
                <h1 >Hello, I am {{ $user->name }}!</h1>
                <ul style="padding: 0;"><li style="display:inline;">{{ $domicile }}</li><li style="display:inline;padding-left:10px;">&#8226 Member since</li></ul>
                <div class="panel panel-default">
                    <div class="panel-heading">About Me</div>
                    <div class="panel-body">
                        <p>{{$description}}</p>
                    </div>
                </div>      
            </div>
        </div>      
    </div>
</div>
@endsection