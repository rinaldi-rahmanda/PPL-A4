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
                 @if($adoption->done=='1')
                <div class="alert alert-warning" role="alert">
                  This adoption is already sold
                </div>
                @endif
                <h4>Owner: <a href="{{URL::to('/profile/view')}}/{{$adoptionOwner->id}}">{{$adoptionOwner->name}}</a></h4>
                <h5>Requested by {{$count}}</h5>
                @if($user && $user->id==$adoption->user_id)
                <ul>
                    @foreach($requests as $personR)
                    <li><a href="{{URL::to('/profile/view')}}/{{$personR->id}}">{{$personR->name}}</a></li>
                    @endforeach
                </ul>
                <a href="{{URL::to('/adoption')}}/mark/{{$adoption->id}}"
                    class="btn btn-sm btn-success">Mark as Done</a>
                <a href="{{URL::to('/adoption')}}/unmark/{{$adoption->id}}"
                    class="btn btn-sm btn-danger">Unmark as Done</a>
                @endif
                @if($user && $user->id!=$adoption->user_id && $adoption->done=='0')
                        @if($request)
                        <button type="submit" disabled class="btn btn-primary btn-sm">Request already sent</button>
                        <form method="POST" action="{{URL::to('/adoption/request/cancel/')}}/{{$adoption->id}}">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger btn-sm">cancel request</button>
                        </form>
                        @else
                        <form method="POST" action="{{URL::to('/adoption/request/')}}/{{$adoption->id}}">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-primary btn-sm">Request to adopt!</button>
                        </form>
                        @endif
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
                <!--<ul>
                Requesting Users:
                <form method="POST" action="{{URL::to('/approve/')}}/{{$adoption->id}}">
                <select class="form-control" name="approved_user" required >
                @foreach($requests as $personR)
                    <option value="{{$personR->id}}">{{$personR->name}}</option>
                @endforeach
                </select>
                <input value="Approve" type="submit" class="form-control btn btn-sm btn-primary">
                </form>
                </ul>-->
                @else
                <h1>No Adoption Found</h1>
                @endif
            </div>
        </div>      
    </div>
</div>
@endsection