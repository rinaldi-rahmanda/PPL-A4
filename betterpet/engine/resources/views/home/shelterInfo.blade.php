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
                <?php
                    if ($shelter->numRating > 0) {
                        echo "Rating: " . ($shelter->rating / 100) . "/5";
                    } else {
                        echo "No ratings yet!";
                    }
                ?>
            </p>
            @if(Auth::check())
                <button type="button" class="register-button btn btn-primary" data-toggle="modal" data-target="#myModal">
                    <span class="glyphicon glyphicon-edit"></span> Leave a rating
                </button>
            @endif
            @if(Auth::check() && $shelterOwner->id==Auth::user()->id)
                <button class="register-button btn btn-success">Edit this shelter</button>
            @endif
            <?php
                echo $shelter->description;
            ?>
        </div>
    </div>
    @if(Auth::check())
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Rate this shelter</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(array('url'=>'shelter/rate/'.$shelter->id,'method'=>'POST')) !!}
                        {!! csrf_field() !!}  
                        <div class="form-group">
                            <label class="in-form" for="exampleInputEmail1"  style="display:block;">Rating</label>
                            <label class="control-label"><input type="radio" name="rating" class=" form-control" value="100">1</label>
                            <label class="control-label"><input type="radio" name="rating" class=" form-control" value="200">2</label>
                            <label class="control-label"><input type="radio" name="rating" class=" form-control" value="300">3</label>
                            <label class="control-label"><input type="radio" name="rating" class=" form-control" value="400">4</label>
                            <label class="control-label"><input type="radio" name="rating" class=" form-control" value="500" checked>5</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @endif
</div>
@endsection