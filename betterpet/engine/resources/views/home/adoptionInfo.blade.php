@extends('layout.template-about')

@section('content')
<style>
    body {
        background-color:#dfeef7;  
        height: 100%;
    }
</style>

<div class='container-fluid'>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-sm-8" style="background-color:white; min-height: 100%; margin-top:8%;">
            <div class="col-md-2 col-sm-2" style="margin-top:5%;margin-bottom:2%;padding-left:3%;">
                <img src="http://placehold.it/200x200" alt="">
                
                
            </div>
            <div class="col-md-offset-1 col-sm-offset-1 col-md-5 col-sm-5" style="margin-top:3%;margin-bottom:2%;padding-left:4%;">
                @if($adoption)
                <h1 >{{$adoption->name}}</h1>
                @if($user && $user->id!=$adoption->id)
                    <a href="{{URL::to('/adoption/request/')}}/{{$adoption->id}}">
                    <button class="btn btn-primary btn-sm">Request to adopt!</button>
                    </a>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">About Me</div>
                    <div class="panel-body">
                       <p>Breed</p>
                        <p>Sex</p>
                        <P>Age</P>
                        
                    </div>
                </div>
                @else
                <h1>No Adoption Found</h1>
                @endif
            </div>
        </div>      
    </div>
</div>
@endsection