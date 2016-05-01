@extends('layout.template-about')

@section('content')
<style>
    body {
        background-color:#dfeef7;  
        height: 100%;
    }
</style>

<div class='container-fluid'>
    <div class="row" style="margin-top:100px">
        <div class="col-md-4 col-xs-4 col-sm-4">
            <img src="{{URL::to('/engine/storage/app/shelterimage')}}/{{$shelter->picture}}"
            class="img img-responsive img-rounded" style="max-width:100%;max-height: 100%">
        </div> 
        <div class="col-md-8 col-xs-8 col-sm-8">
            <h2 class="text-center">{{$shelter->shelterName}}</h2>
            <h4 class="text-center">Owned by 
                <a href="{{URL::to('/profile/view/')}}/{{$shelterOwner->id}}">
                    {{$shelterOwner->name}}
                </a>
            </h4>
            <p class="text-center">
                {{$shelter->description}}
            </p>
        </div>
    </div>
</div>
@endsection