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
                <img class="img-rounded" src="{{URL::to('/engine/storage/app/adoptionimage')}}/{{$adoption->picture}}" width="200px" height="200px" alt="">
                
                
            </div>
            <div class="col-md-offset-1 col-sm-offset-1 col-md-5 col-sm-5" style="margin-top:3%;margin-bottom:2%;padding-left:4%;">
                @if($adoption)
                <h1>{{$adoption->name}}</h1>
                <h4>Owner: <a href="{{URL::to('/profile/view')}}/{{$adoptionOwner->id}}">{{$adoptionOwner->name}}</a></h4>
                <h5>Requested by {{$count}}</h5>
                @if($user && $user->id!=$adoption->id)
                    <form method="POST" action="{{URL::to('/adoption/request/')}}/{{$adoption->id}}">
                        {!! csrf_field() !!}
                        @if($request)
                        <button type="submit" disabled class="btn btn-primary btn-sm">Request already sent</button>
                        @else
                        <button type="submit" class="btn btn-primary btn-sm">Request to adopt!</button>
                        @endif
                    </form>
                    <form method="POST" action="{{URL::to('/adoption/request/cancel')}}/{{$adoption->id}}">
                        {!! csrf_field() !!}
                        @if($request)
                        <button type="submit" class="btn btn-danger btn-sm">Cancel Request</button>
                        @endif
                    </form>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">About Me</div>
                    <div class="panel-body">
                       <p>Breed: {{$adoption->breed}}</p>
                        <p>Sex: {{$adoption->sex}}</p>
                        <P>Age: {{$adoption->age}}</P>
                        <p>Description: {{$adoption->description}}</p>
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