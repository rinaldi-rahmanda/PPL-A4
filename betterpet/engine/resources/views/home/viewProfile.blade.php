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
                <ul style="padding: 0;"><li style="display:inline;">{{ $domicile }}</li><li style="display:inline;padding-left:10px;">&#8226 Member since {{$user->created_at->format('d/m/y')}}</li></ul>

                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-target="#home" data-toggle="tab" >Profile</a></li>
                    <li><a data-target="#adoptions" data-toggle="tab">Adoptions</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        
                        <div class="panel panel-default" style="margin-top:8%;">
                            <div class="panel-heading">About Me</div>
                            <div class="panel-body">
                                <p>{{$description}}</p>
                            </div>
                        </div>      
                    </div>
                    <div class="tab-pane" id="adoptions">
                        <h4 style="margin-top:8%;">My adoption posts</h4>
                    </div>
               
                </div>
                
            </div>


        </div>      
    </div>
</div>

jQuery(function () {
jQuery('#myTab a:last').tab('show')
})
@endsection